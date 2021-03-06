@extends('layout')

@section('title')
    Dienasgrāmatas ieraksts - {{ $post->title }}
@stop

@section('content')
    <h1>Dienasgrāmatas ieraksts - {{ $post->title }}</h1>

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->text }}</p>

    <p><a href="{{ action('PostController@edit', $post) }}">Labot šo ierakstu</a></p>
    <form action="/post/{{ $post->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button>Dzēst šo ierakstu un komentārus</button>
    </form>

    <h1>Komentāri</h1>
    <ul>
        @foreach($post->comments as $comment)
            <li>
                Autors: {{ $comment->email }}
                Datums: {{ $comment->created_at }}
                <form action="/post/{{ $post->id }}/comment/{{ $comment->id }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button>Bloķēt šo personu</button>
                </form>
                {{ $comment->comment }}
            </li>
        @endforeach
    </ul>

    @if (count($errors) > 0)
        <h2>Jūsu ievadītajos datos bija nepilnības</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ action('CommentController@store', $post) }}" method="post">
        <h2>Komentēt</h2>
        {{ csrf_field() }}
        <p>
            <label>Tavs epasts <input type="text" name="email" value="{{ old('email') }}"></label>
        </p>
        <p>
            <label>Tavs komentārs
                <textarea name="comment">{{ old('comment') }}</textarea>
            </label>
        </p>
        <p><input type="submit" value="Komentēt"></p>
    </form>
@stop
