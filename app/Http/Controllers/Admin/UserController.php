<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        // レスポンス例
        // {
        //  [
        //     {
        //         "id": 1,
        //         "name": "Test User",
        //         "email": "test1@example.com",
        //         "email_verified_at": "2024-06-02T11:44:54.000000Z",
        //         "created_at": "2024-06-02T11:44:54.000000Z",
        //         "updated_at": "2024-06-02T11:44:54.000000Z"
        //     }
        //   ]
        // }
        return User::all();
    }

}
