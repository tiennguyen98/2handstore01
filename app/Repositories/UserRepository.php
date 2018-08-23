<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    public function model()
    {
        return \App\User::class;
    }

    public function showCustomer($search)
    {
        return $this->where('role_id', '>', '1')
                ->where('email', 'like', '%' . $search . '%')
                ->orderBy('updated_at', 'desc')
                ->paginate(config('database.paginate'));
    }

    public function verified()
    {
        return $this->where('status', '=', '1');
    }

    public function unverify()
    {
        return $this->where('status', '=', '0');
    }

    public function blocked()
    {
        return $this->where('status', '=', '-1');
    }

    public function option($option)
    {
        if ($option === config('database.verify')) {
            return $this->verified();
        }
        if ($option === config('database.unverify')) {
            return $this->unverify();
        }
        if ($option === config('database.blocked')) {
            return $this->blocked();
        }
        
        return $this;
    }

    public function showOptionCustomer($option, $search = null)
    {
        return $this->option($option)->showCustomer($search);
    }
}
