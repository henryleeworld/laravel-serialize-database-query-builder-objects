<?php

namespace App\Http\Controllers;

use AnourValar\EloquentSerialize\Facades\EloquentSerializeFacade as EloquentSerialize;
use App\Models\User;

class UsersController extends Controller
{
    public function show() 
    {
        $usersSerialized = EloquentSerialize::serialize(User::where('id', '>', '10')->limit(2));
        echo '使用者編號大於 10 的 2 筆資料序列化結果：' . $usersSerialized . PHP_EOL;
        $usersUnserialized = EloquentSerialize::unserialize($usersSerialized)->get();
        echo '使用者編號大於 10 的 2 筆資料反序列化結果：' . PHP_EOL;
        foreach ($usersUnserialized as $user) {
            echo '使用者編號：' . $user->id . ' 的姓名為' . $user->name . PHP_EOL;
        }
    }
}
