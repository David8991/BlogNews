<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscribers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\subscribe;

class mailController extends Controller
{
    public function subscribe (Request $req) 
    {
        $email = DB::table("subscribers")->where("email", $req->input("email"))->first();
        $urlSite = "http://127.0.0.1:8000/";

        if(empty($email)) 
        {
            Mail::to($req->email)->send(new subscribe($urlSite));

            // Добавление данных в БД
            $subscriber = new subscribers();
            $subscriber->email = $req->input("email");
            $subscriber->save();

            return response()->json('Thanks for following us');
        } 
        else 
        {
            return response()->json('You already follow us!');
        }
    }
}
