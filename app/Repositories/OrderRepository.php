<?php

namespace App\Repositories;

class OrderRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Order::class;
    }

    public function discard($id)
    {
        if ($order = $this->model->find($id)) {
            return $order->update([
                'status' => config('site.discard')
            ]);
        }
        
        return false;
    }
}
