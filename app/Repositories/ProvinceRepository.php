<?php

namespace App\Repositories;

class ProvinceRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Province::class;
    }

    public function getProvinces($id)
    {
        return $this->model->where('city_id', $id)->pluck('name', 'id')->all();
    }
}
