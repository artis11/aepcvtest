<ul>
    @foreach ($posts as $post)
        <li>
                <a href="{{ action('PostController@show', $post) }}">{{ $post->id }}: {{ $post->title }}</a>
                <p>Izveidošanas laiks: {{ Carbon\Carbon::parse($post->created_at)->format('Y/m/d H:i:s') }}</p>
                <p>Pēdējo izmaiņu laiks: {{ Carbon\Carbon::parse($post->updated_at)->format('Y/m/d H:i:s') }}</p>
        </li>
    @endforeach
</ul>
<p><a href="{{ action('PostController@create') }}">Pievienot jaunu ierakstu</a></p>