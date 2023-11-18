<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\newsController;
use App\Http\Controllers\articlesUsersController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\commentsController;
use App\Http\Controllers\mailController;
use App\Models\articleUser;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home.home');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $data = articleUser::all();
        $users = User::all();

        // Поменяйте Email Админа для корректной работы сайта
        $admin = $users->where('email', "admin@mail.ru")->first();

        return view('dashboard', ["data" => $data, "users" => $users, "admin" => $admin]);
    })->name('dashboard');
});

Route::controller(newsController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/newsWorld', 'newsWorld')->name('newsWorld');
    Route::get('/newsRussia', 'newsRussia')->name('newsRussia');
    Route::get('/newsEconomy', 'newsEconomy')->name('newsEconomy');
    Route::get('/newsTechnology', 'newsTechnology')->name('newsTechnology');
    Route::get('/newsPolitics', 'newsPolitics')->name('newsPolitics');
    Route::get('/newsSport', 'newsSport')->name('newsSport');
    Route::get('/newsHealth', 'newsHealth')->name('newsHealth');
    Route::get('/newsStyle', 'newsStyle')->name('newsStyle');
    Route::get('/{idNew}/view', 'newView')->name('newView');
    Route::get('/usersNewsAll', 'usersNewsAll')->name('usersNewsAll');
    Route::get('/{idNew}/userView', 'usersNewsView')->name('usersNewsView');
});

Route::controller(articlesUsersController::class)->group(function () {
    Route::get('/{idUser}/addNew', 'addNew')->name('addNew');
    Route::POST('/addNewSubmit', "addNewSubmit")->name('addNewSubmit');
    Route::get('/dashboard/{idArticle}/view','articleView')->name('articleView');
    Route::get('/dashboard/{idArticle}/edit','articleEdit')->name('articleEdit');
    Route::POST('/dashboard/{idArticle}/editSubmit','articleEditSubmit')->name('articleEditSubmit');
    Route::get('/dashboard/{idArticle}/delete','articleDelete')->name('articleDelete');
    Route::get('/dashboard/{idArticle}/publication','articlePublication')->name('articlePublication');
    Route::get('/dashboard/{idArticle}/send','sendForModeration')->name('sendForModeration');
});

Route::controller(usersController::class)->group(function () {
    Route::get('/users', 'users')->name('users');
    // Route::POST('/usersEdit', 'usersEdit')->name('usersEdit');
});

Route::controller(commentsController::class)->group(function () {
    Route::POST('/commentSubmit', 'commentSubmit');
});

Route::POST("/subscribe", [mailController::class, "subscribe"]);