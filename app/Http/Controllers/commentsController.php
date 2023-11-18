<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comments;
use Illuminate\Support\Facades\DB;

class commentsController extends Controller
{
    public function commentSubmit(Request $req) 
    {
        $user = DB::table("users")->where("id", $req->input("userId"))->first();

        // Добавление данных в БД
        $comment = new comments();
        $comment->user_name = $user->name;
        $comment->id_post = $req->input("postId");
        $comment->comment = $req->input("comment");
        $comment->published = date("Y-m-d H:i:s");
        $comment->save();

        return response()->json(['message' => 'Fetch request submitted successfully']);
    }

    
}
