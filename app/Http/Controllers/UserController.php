<?php

namespace App\Http\Controllers;

use App\Request as MyRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        //dd($users[0]->send()->mySendRequests()->get());
        return view('home.users', ['users' => $users]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function personal()
    {
        $user = User::find(Auth::user()->id);
        return view('home.personal', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        $user->userDetail->fill($request->all());
        $user->userDetail->save();
        return redirect('personal');
    }

    public function addToFriends(Request $request)
    {
        $addRequest = new \App\Request();
        $addRequest->sender_id = (int)$request->sender_id;
        $addRequest->taker_id = (int)$request->taker_id;
        $addRequest->accept = 0;
        $addRequest->save();
        return \Response::json(['success' => 'ok']);
    }
}
