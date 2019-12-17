<?php

namespace App\SearchBuilders;

use App\Models\Category;

class ArticleSearchBuilder
{
    // 初始化查询
    protected $params = [
        'index' => 'articles',
        'type' => '_doc',
        'body' => [
            'query' => [
                'bool' => [
                    'filter' => [],
                    'must' => [],
                ],
            ],
        ],
    ];

    // 添加分页查询
    public function paginate($size, $page)
    {
        $this->params['body']['from'] = ($page - 1) * $size;
        $this->params['body']['size'] = $size;

        return $this;
    }

    // 筛选置顶状态的文章
    public function isTop()
    {
        $this->params['body']['query']['bool']['filter'][] = ['term' => ['is_top' => 1]];

        return $this;
    }

    // 筛选状态
    public function status($status)
    {
        $this->params['body']['query']['bool']['filter'][] = ['term' => ['status' => $status]];

        return $this;
    }

    // 按类目筛选商品
    public function category(Category $category)
    {
        $this->params['body']['query']['bool']['filter'][] = ['term' => ['category_id' => $category->id]];
        return $this;
    }

    // 添加搜索词
    public function keywords($keywords)
    {
        // 如果参数不是数组则转为数组
        $keywords = is_array($keywords) ? $keywords : [$keywords];
        foreach ($keywords as $keyword) {
            $this->params['body']['query']['bool']['must'][] = [
                'multi_match' => [
                    'query' => $keyword,
                    'fields' => [
                        'title^3',
                        'summary^2',
                        'content',
                    ],
                ],
            ];
        }

        return $this;
    }


    // 分面搜索的聚合
    public function aggregateProperties()
    {
        $this->params['body']['aggs'] = [
            'properties' => [
                'nested' => [
                    'path' => 'properties',
                ],
                'aggs'   => [
                    'properties' => [
                        'terms' => [
                            'field' => 'properties.name',
                        ],
                        'aggs'  => [
                            'value' => [
                                'terms' => [
                                    'field' => 'properties.value',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return $this;
    }

    // 添加一个按照文章属性筛选的条件
    public function propertyFilter($name, $value)
    {
        $this->params['body']['query']['bool']['filter'][] = [
            'nested' => [
                'path'  => 'properties',
                'query' => [
                    ['term' => ['properties.search_value' => $name.':'.$value]],
                ],
            ],
        ];

        return $this;
    }

    // 添加排序
    public function orderBy($field, $direction)
    {
        if (!isset($this->params['body']['sort'])) {
            $this->params['body']['sort'] = [];
        }
        $this->params['body']['sort'][] = [$field => $direction];

        return $this;
    }

    // 返回构造好的查询参数
    public function getParams()
    {
        return $this->params;
    }
}
