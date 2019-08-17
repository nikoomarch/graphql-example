<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ArticleType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Article',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int()
            ],
            'title' => [
                'type' => Type::string()
            ],
            'body' => [
                'type' => Type::string()
            ],
            'user' => [
                'type' => GraphQL::type('User')
            ],
            'comments' => [
                'type' => Type::listOf(GraphQL::type('Comment'))
            ]
        ];
    }
}
