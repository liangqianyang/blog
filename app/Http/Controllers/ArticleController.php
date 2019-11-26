<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/11/20
 * Time: 17:31
 */

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleLabel;
use App\Models\Category;
use App\Models\Comments;
use App\Services\ArticleService;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * 根据分类获取文章列表
     * @param Request $request
     * @return array
     */
    public function getArticleByCategory(Request $request)
    {
        $category_id = $request->input('category_id');
        $columns = ['id', 'cover', 'title', 'summary'];
        $articles = $this->articleService->getArticleByCategory($category_id, $columns, 5);
        $data = [];
        if ($articles) {
            $data['list'] = $articles;
            $data['pic'] = $articles->random(2);
        }
        return $data;
    }

    public function blog(Request $request)
    {
        $cid = $request->input('cid');
        $category = Category::select(['id','name','image','summary'])->find($cid);
        $columns = ['id','cid', 'cover', 'title', 'summary','is_top','created_at'];
        $count = $this->articleService->getArticlesCountByCategory(null);
        $articles = $this->articleService->getArticleByCategory(null, $columns, 12);
        return view('article.list', ['category' => $category, 'count' => $count, 'articles' => $articles]);
    }

    public function list(Request $request)
    {
        $cid = $request->input('cid');
        $category = Category::select(['id','name','image','summary'])->find($cid);
        $columns = ['id', 'cover', 'title', 'summary','is_top','created_at'];
        $count = $this->articleService->getArticlesCountByCategory($cid);
        $articles = $this->articleService->getArticleByCategory($cid, $columns, 12);
        return view('article.list', ['category' => $category, 'count' => $count, 'articles' => $articles]);
    }

    /**
     * 显示文章详情
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function show(Request $request)
    {
        $id = $request->route('id');
        //文章详情
        $article = $this->articleService->detail($id);
        $article->clicks = $article->clicks + 1;
        $article->save();
        //上一篇
        $prev = Article::query()->select('id', 'title')->where('id', '<', $id)->orderBy('id', 'desc')->limit(1)->first();
        //下一篇
        $next = Article::query()->select('id', 'title')->where('id', '>', $id)->orderBy('id', 'asc')->limit(1)->first();

        $category_id = $article->cid;
        $labels = ArticleLabel::query()->where('a_id', $id)->pluck('label_id');//获取文章所属标签
        //获取相关文章
        $relates = Article::query()->with('labels:labels.id as lid ,title')
            ->select('id', 'title')
            ->whereHas('labels', function ($query) use ($labels) {
                if ($labels) {
                    $query->whereIn('labels.id', $labels);
                }
            })->orWhere('cid', $category_id)->orderBy('clicks', 'desc')->orderBy('comments', 'desc')->get();

        $comments = Comments::query()->where('article_id', $id)->orderBy('created_at', 'desc')->get();
        return view('article.show', ['article' => $article, 'prev' => $prev, 'next' => $next, 'relates' => $relates, 'comments' => $comments]);
    }

    /**
     * 生成验证码
     */
    public function captcha()
    {
        $phraseBuilder = new PhraseBuilder(4, '0123456789');
        $builder = new CaptchaBuilder(null, $phraseBuilder);
        $captcha = $builder->build(100, 30);
        // 获取验证码的内容
        $phrase = $captcha->getPhrase();
        // 把内容存入session
        session()->put('CAPTCHA_IMG', $phrase);
        // 生成图片
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-Type:image/jpeg');
        $builder->output();
    }

    /**
     * 点赞
     * @param Request $request
     * @return array
     */
    public function likes(Request $request)
    {
        $id = $request->input('id');
        $ip = $request->getClientIp();
        $exist = Redis::get($ip . '_' . $id);
        if ($exist) {
            return ['code' => 1001, 'message' => '您已经提交过了!'];
        } else {
            Redis::set($ip . '_' . $id, $id);
            $article = Article::find($id);
            $likes = $article->likes + 1;
            $article->likes = $likes;
            $article->save();
            return ['code' => 0, 'likes' => $likes, 'message' => '感谢您的支持!'];
        }

    }

    /**
     * 评论文章
     * @param Request $request
     * @return array
     */
    public function comment(Request $request)
    {
        $article_id = $request->post('id');
        $username = $request->post('username');
        $captcha = $request->post('captcha');
        if ($captcha == session()->get('CAPTCHA_IMG')) {
            $content = $request->post('content');
            $data['article_id'] = $article_id;
            $data['username'] = $username;
            $data['content'] = $content;
            Comments::create($data);
            return ['code' => 0, 'message' => '发表成功'];
        } else {
            return ['code' => 1001, 'message' => '验证码不对!'];
        }
    }
}
