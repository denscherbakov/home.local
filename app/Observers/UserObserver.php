<?php
namespace App\Observers;

use App\User;
use App\UserDetail;

class UserObserver
{
    public function created(User $user)
    {
        $userDetail = new UserDetail();
        $userDetail->user_id = $user->id;
        $userDetail->save();
    }
}