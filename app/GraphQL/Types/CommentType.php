<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CommentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Comment',
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
            'approved' => [
                'type' => Type::boolean()
            ],
            'user' => [
                'type' => GraphQL::type('User')
            ],
            'article' => [
                'type' => Type::listOf(GraphQL::type('Article'))
            ]
        ];
    }
}
