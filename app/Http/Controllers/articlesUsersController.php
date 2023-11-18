<?php

namespace App\Http\Controllers;

use App\Http\Requests\article;
use Illuminate\Http\Request;
use App\Models\articleUser;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class articlesUsersController extends Controller
{
    public function addNew ($idUser)
    {
        return view("userNews.addNew", ["idUser" => $idUser]);
    }

    public function addNewSubmit(article $req)
    {
        // Установление Часового пояса
        date_default_timezone_set("Europe/Moscow");

        // Добавление данных в БД
        $article = new articleUser();
        $article->creator = $req->input('creator');
        $article->title = $req->input('title');
        $article->category = $req->input('category');
        $article->description = $req->input('description');
        $article->content = $req->input('content');

        // Сохранение картинки в назначенной папке и сохранение пути картинки в БД
        if ($req->file("file")) 
        {
            $path = $req->file("file")->store("files", "public");
            $article->file = $path;
        };

        $article->id_user = Auth::id();

        if ($req->input('articleModeration')) 
        {
            $statusArticle = 1;
        }
        else if ($req->input('adminSave'))
        {
            $statusArticle = 2;
        }
        else if ($req->input('publish'))
        {
            $statusArticle = 3;
        }
        else 
        {
            $statusArticle = 0;
        }

        $article->statusArticle = $statusArticle;
        $article->published = date("Y-m-d H:i:s");
        $article->save();

        return redirect()->route('dashboard');
    }

    public function articleView($idArticle) 
    {   
        // Politics
        $this->authorize('view', articleUser::where('id', $idArticle)->first());
        // Поиск статьи
        $data = articleUser::find($idArticle);
        
        return view("userNews.userNewView", ["data" => $data]);
    }

    public function articleEdit($idArticle) 
    {
        // Politics
        $this->authorize('update', articleUser::where('id', $idArticle)->first());
        
        // Проверка Шлюзов
        if (Gate::denies("articleEdit", $idArticle))
        {
            return view("userNews.userNewError");
        }

        // Определение Админа
        $admin = User::where('email', "admin@mail.ru")->first();
        // Поиск статьи
        $data = articleUser::find($idArticle);

        return view("userNews.userNewEdit", ["data" => $data, "admin" => $admin]);
    }

    public function articleEditSubmit($idArticle, article $req) 
    {
        // Politics
        $this->authorize('update', articleUser::where('id', $idArticle)->first());

        // Проверка Шлюзов
        if (Gate::denies("articleEdit", $idArticle))
        {
            return view("userNews.userNewError");
        }

        if ($req->input('articleModeration')) 
        {
            $statusArticle = 1;
        }
        else if ($req->input('adminSave'))
        {
            $statusArticle = 2;
        }
        else if ($req->input('publish'))
        {
            $statusArticle = 3;
        }
        else 
        {
            $statusArticle = 0;
        }

        //  Удаление старой фотографии с папки при наличии и загрузка новой в БД
        if ($req->file("file")) {
            $data = articleUser::find($idArticle);
            Storage::disk('public')->delete($data->file);

            articleUser::where('id', $idArticle)->update([
            "file" => $req->file("file")->store("files", "public"),
            ]);
        };

        // Установление Часового пояса
        date_default_timezone_set("Europe/Moscow");

        // Обновление Редактированной статьи в БД
        articleUser::where('id', $idArticle)->update([
            "creator" => $req->input('creator'),
            "title" => $req->input('title'),
            "category" => $req->input('category'),
            "description" => $req->input('description'),
            "content" => $req->input('content'),
            "statusArticle" => $statusArticle,
            "published" => date("Y-m-d H:i:s"),
        ]);

        return redirect()->route('dashboard');
    }

    public function articleDelete($idArticle, articleUser $articleUser)
    {   
        // Politics
        $this->authorize('delete', $articleUser->where('id', $idArticle)->first());
        
        // Удаление фотографии с папки
        $data = articleUser::find($idArticle);
        if ($data->file)
        {
            Storage::disk('public')->delete($data->file);
        }
        
        // Удаление Статьи с БД
        articleUser::where('id', $idArticle)->delete();

        return redirect()->route('dashboard');
    }

    public function articlePublication($idArticle) 
    {
        // Установление Часового пояса
        date_default_timezone_set("Europe/Moscow");
        
        // Обновление статуса статьи
        articleUser::where('id', $idArticle)->update(
        [
            "statusArticle" => 3,
            "published" => date("Y-m-d H:i:s"),
        ]);

        return redirect()->route('usersNewsAll');
    }

    public function sendForModeration($idArticle) 
    {
        // Установление Часового пояса
        date_default_timezone_set("Europe/Moscow");
        
        // Обновление статуса статьи
        articleUser::where('id', $idArticle)->update(
        [
            "statusArticle" => 1,
            "published" => date("Y-m-d H:i:s"),
        ]);

        return redirect()->route('dashboard');
    }

}
