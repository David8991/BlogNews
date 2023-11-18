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
    //     // return redirect()->route("users");
    //     // dd($req);

    //     $name = $req->get('name');
    //     $email = $req->get('email');

    //     User::where('email', $email)->update([
    //         "name" => "da"
    //     ]);
    //     // $number = $request->get('number');

    //     return response()->json(['result'=>'Ajax request submitted successfully']);
    // }
}
