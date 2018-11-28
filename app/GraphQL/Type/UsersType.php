<?php

namespace App\GraphQL\Type;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UsersType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'tipo do user',
        'model' => User::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user',
            ],
            'group' => [
                'type' => GraphQL::type('groups'),
                'description' => 'Grupo do usuario',
            ],
            'posts' => [
                'type' => Type::listOf(GraphQL::type('posts')),
                'description' => 'Posts do usuario',
            ]
        ];
    }
}
