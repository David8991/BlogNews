<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usersController extends Controller
{
    public function users() {
        $users = User::all();

        // Поменяйте Email Админа для корректной работы сайта
        $admin = $users->where('email', "admin@mail.ru")->first();

        return view("users.usersAll", ["users" => $users, "admin" => $admin]);
    }

    // public function usersEdit(Request $req) {
    //     $name = $req->input('name');
    //     $userid = $req->input('userId');

    //     User::where('id', $userid)->update([
    //         "name" => $name,
    //     ]);

    //     return response()->json(['result'=>'fetch request submitted successfully']);
    // }
}
