<?php

namespace App\GraphQL\Query;

use App\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class PostQuery extends Query
{

    protected $attributes = [
        'name' => 'Post Query 1',
        'description' => 'Descrição da post query',
    ];

    public function type()
    {
        return GraphQL::paginate('posts');
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
        return Post
            ::with($fields->getRelations())
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($perPage, ['*'], 'page', $page);
    }
}
