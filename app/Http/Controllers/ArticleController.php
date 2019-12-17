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
use App\Models\Label;
use App\SearchBuilders\ArticleSearchBuilder;
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

    /**
     * 个人博客列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function blog(Request $request)
    {
        $cid = $request->route('category_id');
        $limit = 12;
        $category = Category::select(['id', 'name', 'image', 'summary'])->find($cid);
        $columns = ['id', 'cid', 'cover', 'title', 'summary', 'is_top', 'created_at'];
        $count = $this->articleService->getArticlesCountByCategory(null);
        $articles = $this->articleService->getPaginateArticleByCategory(null, $columns, $limit);
        return view('article.blog', ['category' => $category, 'count' => $count, 'articles' => $articles]);
    }

    /**
     * 文章列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function list(Request $request)
    {
        $cid = $request->route('category_id');
        $limit = 12;
        $category = Category::select(['id', 'name', 'image', 'summary'])->find($cid);
        $columns = ['id', 'cid', 'cover', 'title', 'summary', 'is_top', 'created_at'];
        $count = $this->articleService->getArticlesCountByCategory($cid);
        $articles = $this->articleService->getPaginateArticleByCategory($cid, $columns, $limit);

        return view('article.list', ['category' => $category, 'count' => $count, 'articles' => $articles]);
    }

    /**
     * 根据标签获取文章的分页列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function labels(Request $request)
    {
        $label_id = $request->route('label_id');
        $label = Label::select(['id', 'title'])->find($label_id);
        $limit = 12;
        $columns = ['id', 'cid', 'cover', 'title', 'summary', 'is_top', 'created_at'];
        $count = $this->articleService->getArticlesCountByLabel($label_id);
        $articles = $this->articleService->getPaginateArticleByLabel($label_id, $columns, $limit);
        return view('article.labels', ['label' => $label, 'count' => $count, 'articles' => $articles]);
    }

    /**
     * 显示文章详情
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|
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

        //相关文章
        $title = $article->title;//文章标题
        $builder = (new ArticleSearchBuilder())->status('0');
        $keywords = array_filter(explode(' ', $title));
        $builder->keywords($keywords);
        $builder->aggregateProperties();
        $builder->orderBy('is_top', 'desc');
        $builder->orderBy('likes', 'desc');
        $builder->orderBy('comments', 'desc');
        $result = app('es')->search($builder->getParams());
        // 通过 collect 函数将返回结果转为集合，并通过集合的 pluck 方法取到返回的文章 ID 数组
        $articlesIds = collect($result['hits']['hits'])->pluck('_id')->all();
        // 通过 whereIn 方法从数据库中读取文章数据
        $relates = Article::query()
            ->select('id','title')
            ->whereIn('id', $articlesIds)
            // orderByRaw 可以让我们用原生的 SQL 来给查询结果排序
            ->orderByRaw(sprintf("FIND_IN_SET(id, '%s')", join(',', $articlesIds)))
            ->get();
        //相关文章

        $comments = Comments::query()->where('article_id', $id)->orderBy('created_at', 'desc')->get();
        $url = $request->url();//文章的链接
        return view('article.show', ['url'=>$url,'article' => $article, 'prev' => $prev, 'next' => $next, 'relates' => $relates, 'comments' => $comments]);
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
