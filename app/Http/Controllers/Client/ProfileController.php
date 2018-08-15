<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function index(Request $request, User $user)
    {
        $rates = $user->getAverageRate();
        $my_vote = false;
        if ($request->user()) {
            $my_vote = $user->getVote($request->user());
        }
        $user_products = $user->products()
                            ->withProvince()
                            ->paginate(config('database.paginate'));

        return view('client.profile.index', compact('user', 'rates', 'my_vote', 'user_products'));
    }

    public function rating(Request $request, User $user)
    {
        if (!$request->ajax() || !$request->has('stars') || $request->user() == $user) {
            return response()->json([
                'error' => true
            ]);
        }
        $user->saveRater($request->user(), $request->stars);
        $response = $user->getAverageRate();

        return response()->json($response);
    }
}
