<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class GroupsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'GroupsType',
        'description' => 'A type',
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
        ];
    }
}
