<div id="commentsCont" class="hidden">
    @if (!empty($comment))
        @foreach ($comment as $el)
            <div class="commentCont d-flex flex-column align-items-start mb-3 p-3">
                <div class="d-flex gap-1 w-100 flex-column">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="rounded-circle comment-img-div">
                            <img class="w-100 h-100" src="../../avatar.png" alt="avatar">
                        </div>
                        <div>
                            <span>{{ $el->user_name }}</span> - 
                            <span>{{ \Carbon\Carbon::parse($el->published)->locale('ru')->diffForHumans() }}</span>
                        </div>
                        
                    </div>
                    <div class="comment-text-cont">
                        <p>{{ $el->comment }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>