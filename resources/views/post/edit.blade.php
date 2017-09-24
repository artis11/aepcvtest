@extends('layout')

@section('title')
    Labot dienasgrāmatas ierakstu {{ $post->id }}
@stop

@section('content')
    <h1>Ieraksta {{ $post->id }} labošana</h1>


    @if (count($errors) > 0)
        <h2>Jūsu ievadītajos datos bija nepilnības</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <form action="{{ action('PostController@update', $post) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <p>
            <label>Ieraksta virsraksts <input type="text" name="title" value="{{ old('title', $post->title) }}"></label>
        </p>
        <p>
            <label>Ieraksta teksts
                <textarea name="text">{{ old('text', $post->text) }}</textarea>
            </label>
        </p>
        <p><input type="submit" value="Izveidot"></p>
    </form>
@stop

    