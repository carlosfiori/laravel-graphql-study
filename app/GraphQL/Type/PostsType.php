<?php

namespace App\GraphQL\Type;

use App\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Post',
        'description' => 'tipo do post',
        'model' => Post::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the post',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The title of the post',
            ],
            'body' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The body of the post',
            ],
            'user' => [
                'type' => GraphQL::type('user'),
                'description' => 'The user of the post',
            ],
        ];
    }
}
