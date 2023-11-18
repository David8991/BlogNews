<x-mail::message>
<x-mail::panel>
    You have subscribed to our blog newsletter!
</x-mail::panel>

<x-mail::button :url="$urlSite">
Visit site
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
