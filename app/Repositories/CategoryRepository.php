<?php

namespace App\Repositories;

class CategoryRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Category::class;
    }

    public function arrayCategories()
    {
        return $this->where('parent_id', '=', null)
                ->pluck('name', 'id')
                ->toArray();
    }

    public function findBySlug($slug)
    {
        $category = $this->where('slug', $slug)->first();
        if ($category) {
            return $category;
        }

        return false;
    }
}
