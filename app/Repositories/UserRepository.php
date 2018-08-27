<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    public function model()
    {
        return \App\User::class;
    }

    public function showCustomer()
    {
        $this->newQuery()
            ->loadWhere();
        $args = func_get_args();
        $this->model->where('role_id', '>', '1');
        if (func_num_args() < 1 || strlen($args[0]) < 2) {
            return $this->model->orderBy('updated_at', 'desc')
                    ->paginate(config('database.paginate'));
        }
        $args[0] = '+' . $args[0] . '*';
        $this->model->whereRaw("MATCH (`email`, `name`) AGAINST (? IN BOOLEAN MODE)", [$args[0]]);
        if (func_num_args() == 1) {
            return $this->model->orderBy('updated_at', 'desc')
                ->paginate(config('database.paginate'));
        }

        return $this->model->orderBy('updated_at', 'desc')
                ->paginate($args[1]);
    }

    public function verified()
    {
        $this->newQuery()
            ->loadWhere();

        return $this->where('status', '=', '1');
    }

    public function unverify()
    {
        $this->newQuery()
            ->loadWhere();

        return $this->where('status', '=', '0');
    }

    public function blocked()
    {
        $this->newQuery()
            ->loadWhere();
            
        return $this->where('status', '=', '-1');
    }

    public function option($option)
    {
        if ($option == config('database.verified')) {
            return $this->verified();
        }
        if ($option == config('database.unverify')) {
            return $this->unverify();
        }
        if ($option == config('database.blocked')) {
            return $this->blocked();
        }
        
        return $this;
    }

    public function showOptionCustomer($option, $search = null)
    {
        $this->newQuery()
            ->loadWhere();

        return $this->option($option)->showCustomer($search);
    }
}
