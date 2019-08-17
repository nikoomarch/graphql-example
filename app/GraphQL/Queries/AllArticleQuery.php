<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Article;
use App\User;
use Closure;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;

class AllArticleQuery extends Query
{
    protected $attributes = [
        'name' => 'allArticle',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('Article');
    }

    public function args(): array
    {
        return [
            'limit' => [
                'type' => Type::nonNull(Type::int())
            ],
            'page' => [
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();
        $articles = Article::with($with)->select($select)->paginate($args['limit'], ['*'], 'page', $args['page']);
        dd($articles);
        return $articles;
    }
}
