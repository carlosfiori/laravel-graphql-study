<?php

namespace App\GraphQL\Query;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class UserQuery extends Query
{

    protected $attributes = [
        'name' => 'Users Query 1',
        'description' => 'Descrição da user query',
    ];

    public function type()
    {
        return GraphQL::paginate('users');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
            'limit' => [
                'name' => 'limit',
                'type' => Type::int(),
            ],
            'page' => [
                'name' => 'page',
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where('id', $args['id']);
            }
        };
        $perPage = $args['limit'] ?? 10;
        $page = $args['page'] ?? 1;
        return User
            ::with($fields->getRelations())
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($perPage, ['*'], 'page', $page);
    }
}
