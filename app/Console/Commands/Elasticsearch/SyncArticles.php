<?php

namespace App\Console\Commands\Elasticsearch;

use App\Models\Article;
use Illuminate\Console\Command;

class SyncArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es:sync-articles {--index=articles}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '同步已创建的文章到ES中';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 获取 Elasticsearch 对象
        $es = app('es');

        Article::query()
            ->with('categories:id,name')
            ->with('labels:labels.id,title')
            ->where('status', '0')
            // 使用 chunkById 避免一次性加载过多数据
            ->chunkById(100, function ($articles) use ($es) {
                $this->info(sprintf('正在同步 ID 范围为 %s 至 %s 的文章', $articles->first()->id, $articles->last()->id));
                // 初始化请求体
                $req = ['body' => []];
                // 遍历商品
                foreach ($articles as $article) {
                    // 将商品模型转为 Elasticsearch 所用的数组
                    $data = $article->toESArray();

                    $req['body'][] = [
                        'index' => [
                            // 从参数中读取索引名称
                            '_index' => $this->option('index'),
                            '_type'  => '_doc',
                            '_id'    => $data['id'],
                        ],
                    ];
                    $req['body'][] = $data;
                }
                try {
                    // 使用 bulk 方法批量创建
                    $es->bulk($req);
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                }
            });
        $this->info('同步完成');
    }
}
