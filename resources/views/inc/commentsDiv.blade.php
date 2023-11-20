<div id="commentsCont" class="hidden">
    @if (!empty($comment))
        @foreach ($comment as $el)
            <div class="commentCont d-flex flex-column align-items-start mb-3 p-3 hidden-class">
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
    <button type="button" class="btn btn-primary btn-sm comments-btn hidden-class">Показать еще</button>
</div>

<script>
    //          Скрипт для ограничения отображения комментариев и их показа через кнопку
    
    let showMoreBtn = document.querySelector(".comments-btn");
    let commentCard = document.querySelectorAll(".commentCont");
    let indexCard = 0;

    function showMore() {
        showMoreBtn.addEventListener("click", () => {
            cardsShow();
        })
    }

    function cardsShow () 
    {
        if (commentCard.length >= indexCard + 3) 
        {
            for (let i = indexCard; i < indexCard + 3; i++) 
            {
                commentCard[i].classList.remove("hidden-class");
            }

            indexCard += 3;
            showMoreBtn.classList.remove("hidden-class");
            showMore();
        }
        else
        {
            showMoreBtn.classList.add("hidden-class");

            for (let i = indexCard; i < commentCard.length; i++) 
            {
                commentCard[i].classList.remove("hidden-class");
            }
        }
    }

    if (commentCard.length > 3) cardsShow()
    else {
        commentCard.forEach(item => {
            item.classList.remove("hidden-class");
        })
    }
</script>