<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NewsdataIO\NewsdataApi;
use App\Models\articleUser;
use App\Models\comments;
use Illuminate\Support\Facades\DB;

class newsController extends Controller
{
    public function home()
    {
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "category" => "top",
            "language" => "en", 
            "image" => "1",
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //First post
        $data2 = [
            "category" => "top",
            "language" => "en", 
            "image" => "1", 
            "country" => "us", 
            "prioritydomain" => "top", 
            "full_content" => "1", 
            "timeframe" => "24",
        ];
        $response2 = $newsdataApiObj->get_latest_news($data2);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();

        return view("home.home", ["data" => $response->results, "userData" => $userData, "data2" => $response2->results]);
    }

    public function newsWorld () 
    {
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "category" => "world",
            "language" => "en", 
            "image" => "1",
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //First post
        $data2 = [
            "category" => "world",
            "language" => "en", 
            "image" => "1", 
            "country" => "us", 
            "prioritydomain" => "top", 
            "full_content" => "1", 
            "timeframe" => "24",
        ];
        $response2 = $newsdataApiObj->get_latest_news($data2);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();

        return view("news.newsWorld", ["data" => $response->results, "userData" => $userData, "data2" => $response2->results]);
    }

    public function newsRussia () 
    {
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "country" => "ru",
            "language" => "en", 
            "image" => "1",
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //First post
        $data2 = [
            "country" => "ru",
            "language" => "en", 
            "image" => "1", 
            "country" => "us", 
            "prioritydomain" => "top", 
            "full_content" => "1", 
            "timeframe" => "24",
        ];
        $response2 = $newsdataApiObj->get_latest_news($data2);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();
        
        return view("news.newsRussia", ["data" => $response->results, "userData" => $userData, "data2" => $response2->results]);
    }

    public function newsEconomy () 
    {
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "category" => "business",
            "language" => "en", 
            "image" => "1",
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //First post
        $data2 = [
            "category" => "business",
            "language" => "en", 
            "image" => "1", 
            "country" => "us", 
            "prioritydomain" => "top", 
            "full_content" => "1", 
            "timeframe" => "24",
        ];
        $response2 = $newsdataApiObj->get_latest_news($data2);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();
        
        return view("news.newsEconomy", ["data" => $response->results, "userData" => $userData, "data2" => $response2->results]);
    }

    public function newsTechnology () 
    {
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "category" => "technology",
            "language" => "en", 
            "image" => "1",
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //First post
        $data2 = [
            "category" => "technology",
            "language" => "en", 
            "image" => "1", 
            "country" => "us", 
            "prioritydomain" => "top", 
            "full_content" => "1", 
            "timeframe" => "24",
        ];
        $response2 = $newsdataApiObj->get_latest_news($data2);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();
        
        return view("news.newsTechnology", ["data" => $response->results, "userData" => $userData, "data2" => $response2->results]);
    }

    public function newsPolitics () 
    {
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "category" => "politics",
            "language" => "en", 
            "image" => "1",
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //First post
        $data2 = [
            "category" => "politics",
            "language" => "en", 
            "image" => "1", 
            "country" => "us", 
            "prioritydomain" => "top", 
            "full_content" => "1", 
            "timeframe" => "24",
        ];
        $response2 = $newsdataApiObj->get_latest_news($data2);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();
        
        return view("news.newsPolitics", ["data" => $response->results, "userData" => $userData, "data2" => $response2->results]);
    }

    public function newsSport () 
    {
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "category" => "sports",
            "language" => "en", 
            "image" => "1",
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //First post
        $data2 = [
            "category" => "sports",
            "language" => "en", 
            "image" => "1", 
            "country" => "us", 
            "prioritydomain" => "top", 
            "full_content" => "1", 
            "timeframe" => "24",
        ];
        $response2 = $newsdataApiObj->get_latest_news($data2);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();
        
        return view("news.newsSport", ["data" => $response->results, "userData" => $userData, "data2" => $response2->results]);
    }

    public function newsHealth () 
    {
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "category" => "health", 
            "language" => "en", 
            "image" => "1",
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //First post
        $data2 = [
            "category" => "health",
            "language" => "en", 
            "image" => "1", 
            "country" => "us", 
            "prioritydomain" => "top", 
            "full_content" => "1", 
            "timeframe" => "24",
        ];
        $response2 = $newsdataApiObj->get_latest_news($data2);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();
        
        return view("news.newsHealth", ["data" => $response->results, "userData" => $userData, "data2" => $response2->results]);
    }

    public function newsStyle () 
    {
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "category" => "entertainment",
            "language" => "en", 
            "image" => "1",
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //First post
        $data2 = [
            "category" => "entertainment", 
            "language" => "en", 
            "image" => "1",
            "prioritydomain" => "top",
            "full_content" => "1", 
            "timeframe" => "24",
        ];
        $response2 = $newsdataApiObj->get_latest_news($data2);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();
        
        return view("news.newsStyle", ["data" => $response->results, "userData" => $userData, "data2" => $response2->results]);
    }

    public function newView($id) 
    {   
        $newsdataApiObj = new NewsdataApi("pub_2860294907a351e51b09309341c65ae2bdceb");
        //news by category
        $data = [
            "qInTitle" => str_replace(":", "", $id), 
            "language" => "en"
        ];
        $response = $newsdataApiObj->get_latest_news($data);
        //users news
        $userData = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();

        return view('news.newView', ['data' => $response->results, "userData" => $userData]);
    }

    public function usersNewsAll() 
    {   
        //users news
        $data = articleUser::where("statusArticle", 3)->orderBy('published', "DESC")->get();

        return view("news.usersNewsAll", ["data" => $data]);
    }

    public function usersNewsView($idNew) 
    {   
        $data = articleUser::find($idNew);
        $comment = DB::table('comments')->where("id_post", $idNew)->orderBy("published", "asc")->get();

        return view("news.usersNewsView", ["data" => $data, "comment" => $comment]);
    }
    
}
