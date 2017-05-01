@foreach($pages as $page)
    <url>
        <loc>{{(string) $page}}</loc>
        <changefreq>{{$page->changeFrequency()}}</changefreq>
    </url>
@endforeach