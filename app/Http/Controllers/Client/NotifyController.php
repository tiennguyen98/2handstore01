<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Repositories\NotifyRepository;

class NotifyController extends Controller
{
    private $notify;

    public function __construct(NotifyRepository $notifyRepository)
    {
        $this->notify = $notifyRepository;
    }

    public function index(Request $request)
    {
        $notifications = $this->notify->getUserNotifications($request->user());

        return view('client.user.notify', compact('notifications'));
    }

    public function changeStatus(Request $request)
    {
        $this->validate(
            $request,
            [
                'id' => 'required'
            ]
        );
        $this->notify->updateStatus($request->id, 0);

        return redirect()->back(); 
    }

    public function changeAllStatus(Request $request)
    {
        
        $this->notify->changeAllStatus($request->user(), 0);

        return redirect()->back();
    }
}
