<?php

namespace App\Repositories;

class CommentRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Comment::class;
    }
    
    public function parentComments($id)
    {
        $this->newQuery()
            ->loadWhere();

        return $this->model->where('product_id', '=', $id)->with('user')->with(['comments' => function ($query) {
            $query->with('user');
        }])->where('parent_id', '=', null)->get();
    }
}
