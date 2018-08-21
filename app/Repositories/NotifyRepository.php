<?php

namespace App\Repositories;

class NotifyRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Notification::class;
    }

    public function getUserNotifications($user)
    {
        return $user->notifications()->latest()->get();
    }

    public function updateStatus($id, $status)
    {
        if ($model = $this->model->find($id)) {
            return $model->update([
                'status' => $status
            ]);
        }

        return false;
    }

    public function changeAllStatus($user, $status)
    {
        return $user->notifications()->update([
            'status' => $status
        ]);
    }
}
