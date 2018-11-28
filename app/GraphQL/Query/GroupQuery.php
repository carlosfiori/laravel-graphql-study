<?php

namespace App\GraphQL\Query;

use App\Group;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class GroupQuery extends Query
{
    protected $attributes = [
        'name' => 'GroupQuery',
        'description' => 'A query',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('groups'));
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return Group
            ::select($select)
            ->with($with)
            ->get();
    }
}
