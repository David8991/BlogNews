<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h4 class="mt-8 mb-5 text-2xl font-smoll text-gray-900">
        @if (Auth::id() == $admin->id)
            Статьи Пользователей:
        @else
            Ваши Статьи:
        @endif
    </h4>
    @foreach ($data as $el)
        <!-- Статьи которые видны Администратору -->
        @if (Auth::id() == $admin->id && $el->statusArticle !== 0 && $el->statusArticle !== 2 && $el->id_user !== $admin->id)

            <div class="mb-3 card text-center">
                <div class="card-header d-flex justify-content-between">
                    <span>Nickname: <b>{{ $el->creator }}</b></span>
                    <span>
                        @foreach($users as $user)
                            @if ($el->id_user == $user->id)
                                User: <b>{{ $user->name }}</b>
                            @endif
                        @endforeach
                    </span>
                    <span>Category: <b>{{ $el->category }}</b></span>
                    <span>Created: {{ \Carbon\Carbon::parse($el->published)->locale('ru')->diffForHumans() }}</span>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $el->title }}</h4>
                    <p class="card-text">{{ $el->description }}</p>
                    
                </div>
                <div class="card-footer text-body-secondary d-flex gap-3 justify-content-between">
                    <div class="w-50 row gap-3">
                        @if ($el->statusArticle !== 3)
                            <a href="{{ route('articlePublication', $idArticle = $el->id) }}" class="btn btn-info col">Publish</a>
                        @endif
                        <a href="{{ route('articleView', $idArticle = $el->id) }}" class="btn btn-primary col">Read more</a>
                        <a href="{{ route('articleDelete', $idArticle = $el->id) }}" class="btn btn-danger col">Delete</a>
                    </div>
                    
                    <div  class="d-flex align-items-center gap-1">
                        <b>Status: </b> 
                        @if ($el->statusArticle == 1)
                            Отправлен на проверку
                        @elseif ($el->statusArticle == 3)
                            Опубликована
                        @else
                            Не определен
                        @endif
                    </div>
                </div>
            </div>

        <!-- Статьи которые видны Пользователям -->
        @elseif ($el->id_user == Auth::id() && $el->id_user !== $admin->id)
        
            <div class="mb-3 card text-center">
                <div class="card-header d-flex justify-content-between">
                    <span>Creator: <b>{{ $el->creator }}</b></span>
                    <span>Category: <b>{{ $el->category }}</b></span>
                    <span>Created: {{ \Carbon\Carbon::parse($el->published)->locale('ru')->diffForHumans() }}</span>
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $el->title }}</h4>
                    <p class="card-text">{{ $el->description }}</p>
                    
                </div>
                <div class="card-footer text-body-secondary d-flex gap-3 justify-content-between">
                    <div class="w-50 row gap-3">
                        @if($el->statusArticle == 0)
                            <a href="{{ route('sendForModeration', $idArticle = $el->id) }}" class="btn btn-info col">Send</a>
                        @endif
                        <a href="{{ route('articleView', $idArticle = $el->id) }}" class="btn btn-primary col">Read more</a>
                        <a href="{{ route('articleEdit', $idArticle = $el->id) }}" class="btn btn-warning col">Edit</a>
                        <a href="{{ route('articleDelete', $idArticle = $el->id) }}" class="btn btn-danger col">Delete</a>
                    </div>
                    
                    <div  class="d-flex align-items-center gap-1">
                        <b>Status: </b> 
                        @if($el->statusArticle == 0)
                            На редактировании
                        @elseif ($el->statusArticle == 1)
                            На проверке
                        @elseif ($el->statusArticle == 3)
                            Опубликована
                        @else
                            Не определен
                        @endif
                    </div>
                </div>
            </div>

        @endif
    @endforeach
</div>

<!-- Статьи Администратора -->
@if (Auth::id() == $admin->id)
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <h3 class="mt-8 mb-5 text-2xl font-smoll text-gray-900">
            Ваши Статьи: 
        </h3>
        @foreach ($data as $el)
            @if ($el->id_user == $admin->id && !empty($el->id_user))
                <div class="mb-3 card text-center">
                    <div class="card-header d-flex justify-content-between">
                        <span>Nickname: <b>{{ $el->creator }} </b></span>
                        <span>
                            @foreach($users as $user)
                                @if ($el->id_user == $user->id)
                                    User: <b>{{ $user->name }}</b>
                                @endif
                            @endforeach
                        </span>
                        <span>Category: <b>{{ $el->category }}</b></span>
                        <span>Created: {{ \Carbon\Carbon::parse($el->published)->locale('ru')->diffForHumans() }}</span>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{ $el->title }}</h4>
                        <p class="card-text">{{ $el->description }}</p>
                        
                    </div>
                    <div class="card-footer text-body-secondary d-flex gap-3 justify-content-between">
                        <div class="w-50 row gap-3">
                            @if ($el->statusArticle !== 3)
                                <a href="{{ route('articlePublication', $idArticle = $el->id) }}" class="btn btn-info col">Publish</a>
                            @endif
                            <a href="{{ route('articleView', $idArticle = $el->id) }}" class="btn btn-primary col">Read more</a>
                            <a href="{{ route('articleEdit', $idArticle = $el->id) }}" class="btn btn-warning col">Edit</a>
                            <a href="{{ route('articleDelete', $idArticle = $el->id) }}" class="btn btn-danger col">Delete</a>
                        </div>
                        
                        <div  class="d-flex align-items-center gap-1">
                            <b>Status: </b> 
                            @if ($el->statusArticle == 2)
                                Черновик
                            @elseif ($el->statusArticle == 3)
                                Опубликована
                            @else
                                Не определен
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endif