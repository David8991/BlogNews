@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'BlogNews')
<img 
    src="https://s203vla.storage.yandex.net/rdisk/367ee97c508e191d379bcba0174c52a10c72127be161da1146dab0199d8c3ba6/6594448d/N2LjALivZo7-LjUanKyilz-IXbrRCwQ0tg6885eoYgN2KxKbjqcPvii9eouG8eKQghHYcQ1MOXw436Zr2wXejA==?uid=580988562&filename=logo128px.png&disposition=inline&hash=&limit=0&content_type=image%2Fpng&owner_uid=580988562&fsize=6563&hid=6567e83efe76b4c8342fec1b72485041&media_type=image&tknv=v2&etag=aacbea2ef6b003746799ba8f40f57bd5&rtoken=IKAYgAvOkUg0&force_default=yes&ycrid=na-c5c1429db82107367e72a5847f5bc2e3-downloader7f&ts=60df9a3007d40&s=762a602419b806e45038a7563e0fc52cc9568e6c42e4ab1fdc15c4b05ddf889a&pb=U2FsdGVkX19Xj_MM3_EJNUTkTKh4Q4EPpowdvrH-Bwgcb9JNgncBe4DNBY0ulYqnibxH0hkTwb51jww6i5YGkIczuJBbslDInIzPx0GTlR8" 
    class="logo" 
    alt="BlogNews Logo"
>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
