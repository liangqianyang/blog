<?php

namespace App\Console\Commands\Elasticsearch\Indices;
use Illuminate\Support\Facades\Artisan;

class ArticleIndex
{
    public static function getAliasName()
    {
        return 'articles';
    }

    public static function getProperties()
    {
        return [
            'c_id' => [
                'type' => 'integer'
            ],
            'categories' => [
                'type' => 'nested',
                'properties' => [
                    'id' => [
                        'type' => 'integer'
                    ],
                    'name' => [
                        'type' => 'keyword'
                    ],
                ]

            ],
            'labels' => [
                'type' => 'nested',
                'properties' => [
                    'id' => [
                        'type' => 'integer'
                    ],
                    'title' => [
                        'type' => 'keyword'
                    ]
                ]
            ],
            'title' => [
                'type' => 'text',
                'analyzer' => 'ik_smart'
            ],
            'summary' => [
                'type' => 'text',
                'analyzer' => 'ik_smart'
            ],
            'content' => [
                'type' => 'text',
                'analyzer' => 'ik_smart'
            ],
            'publish_date' => [
                'type' => 'date',
                'format' => 'yyyy-MM-dd HH:mm:ss'
            ],
            'status' => [
                'type' => 'keyword',
            ],
            'clicks' => [
                'type' => 'integer',
            ],
            'likes' => [
                'type' => 'integer',
            ],
            'comments' => [
                'type' => 'integer',
            ],
            'is_top' => [
                'type' => 'keyword',
            ],
        ];
    }

    public static function rebuild($indexName)
    {
        Artisan::call('es:sync-articles', ['--index' => $indexName]);
    }
}
