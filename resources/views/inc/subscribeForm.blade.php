<div class="col-md-5 offset-md-1 mb-3 text-start">
    <form id="subscribe">
        @csrf
        <h5 id="subscribeText">Subscribe to our newsletter</h5>
        <p>Monthly digest of what's new and exciting from us.</p>
        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" name="email" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="submit" value="subscribe">Subscribe</button>
        </div>
    </form>
</div>

<script>
    subscribe.onsubmit = async (e) => 
    {
        e.preventDefault(); 
        let mailInput = document.getElementById("newsletter1");
        let subscribeText = document.getElementById("subscribeText");

        try 
        {
            let response = await fetch('/subscribe', {
                method: 'POST',
                body: new FormData(subscribe)
            });
        
            let result = await response.json();
            
            mailInput.value = "";
            subscribeText.nextElementSibling.innerText = "";
            subscribeText.innerText = result;

        } catch (error) 
        {
            console.error("Ошибка:", error);
        }

        
    };
</script>