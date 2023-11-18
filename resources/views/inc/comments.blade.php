<form id="formElem" class="mt-3">
    @csrf
    <div class="form-floating d-flex gap-3 align-items-start">
        <textarea name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        <label for="floatingTextarea">Write a comment</label>
        <input type="hidden" name="postId" value="{{ $data->id }}">
        <input type="hidden" name="userId" value="{{ Auth::id() }}">
        <input class="btn btn-primary" type="submit" id="commentSubmit" disabled name="sendComment">
    </div>
</form>

<script>
    // активация кнопки отправки коментарии
    let commentSubmit = document.getElementById("commentSubmit");
    let commentText = document.getElementById("floatingTextarea");

    commentText.addEventListener("input", () => 
    {
        if(commentText.value.length >= 1 && commentText.value.length <= 250) 
        {
            commentSubmit.disabled = false;
        }else commentSubmit.disabled = true;
    })
    
    //fetch запрос с данными формы и id поста и пользователя
    formElem.onsubmit = async (e) => 
    {
        e.preventDefault(); 

        try 
        {
            let response = await fetch('/commentSubmit', {
                method: 'POST',
                body: new FormData(formElem)
            });
        
            let result = await response.json();

        } catch (error) 
        {
            console.error("Ошибка:", error);
        }

        await location.reload();
        commentText.value = "";
        commentSubmit.disabled = true
    };
</script>