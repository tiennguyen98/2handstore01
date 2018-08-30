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
        $this->makeModel();
        
        return $this->model->where('parent_id', '=', null)
                ->pluck('name', 'id')
                ->toArray();
    }

    public function findBySlug($slug)
    {
        $this->newQuery()
            ->loadWhere();
        $category = $this->where('slug', $slug)->first();
        if ($category) {
            return $category;
        }

        return false;
    }

    public function analyticsCategory()
    {
        $this->makeModel();
        $data = [
            'categories' => [],
            'numbers' => [],
        ];
        foreach ($this->model->get() as $value) {
            $data['categories'][] = $value->name;
            $data['numbers'][] = $value->products()->count();
        }

        return $data;
    }
}
