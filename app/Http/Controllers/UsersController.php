<?php

namespace App\Http\Controllers;

use AnourValar\EloquentSerialize\Facades\EloquentSerializeFacade as EloquentSerialize;
use App\Models\User;

class UsersController extends Controller
{
    public function show() 
    {
        $usersSerialized = EloquentSerialize::serialize(User::where('id', '>', '10')->limit(2));
        echo __('Serialization results of 2 pieces of data with user ID numbers greater than 10:') . $usersSerialized . PHP_EOL;
        $usersUnserialized = EloquentSerialize::unserialize($usersSerialized)->get();
        echo __('Deserialization results of 2 pieces of data with user ID numbers greater than 10:') . $usersUnserialized . PHP_EOL;
        foreach ($usersUnserialized as $user) {
            echo __('User ID:') . $user->id . __(' whose name is ') . $user->name . PHP_EOL;
        }
    }
}
