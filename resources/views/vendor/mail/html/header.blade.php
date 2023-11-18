@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'BlogNews')
<img 
    src="https://s203vla.storage.yandex.net/rdisk/f7cdff7011b29c24d25991a7456b9e7b874c6bff383e6cbbccd78e620a533971/6558ff19/N2LjALivZo7-LjUanKyilz-IXbrRCwQ0tg6885eoYgN2KxKbjqcPvii9eouG8eKQghHYcQ1MOXw436Zr2wXejA==?uid=0&filename=logo128px.png&disposition=inline&hash=&limit=0&content_type=image%2Fpng&owner_uid=0&fsize=6563&hid=6567e83efe76b4c8342fec1b72485041&media_type=image&tknv=v2&etag=aacbea2ef6b003746799ba8f40f57bd5&rtoken=3m8iNObcVBq4&force_default=no&ycrid=na-d378053d48af6c61da70d9f7f6a98e08-downloader15e&ts=60a713a7b3840&s=434d2575a7f8f32b5db983c2e1799236ecdcbcd4e3a9c20b2e9ba3fa6ca824d2&pb=U2FsdGVkX1-8YWV83ElZwHV6iqF1CL7XlnksjAfHrcE8v8w0RnOBf2AtEhw8Ci_7NnYXh1QSl42fVIR9CKd9dYF3WqebsgYXB4X193KjRLU" 
    class="logo" 
    alt="BlogNews Logo"
>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
