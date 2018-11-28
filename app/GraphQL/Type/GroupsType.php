<?php

namespace App\GraphQL\Type;

use App\Group;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class GroupsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'GroupsType',
        'description' => 'A type',
        'model' => Group::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the user',
            ],
            'descricao' => [
                'type' => Type::string(),
                'description' => 'Descricao',
            ],
            'users' => [
                'type' => Type::listOf(GraphQL::type('users')),
                'description' => 'Usuarios do Grupo',
            ],
        ];
    }
}
