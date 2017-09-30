@extends('layout')

@section('title')
    Labot dienasgrāmatas ierakstu {{ $post->id }}
@stop

@section('js')
    <script src="{{ asset('js/editPost.js') }}"></script>
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


    <form id="myForm" action="{{ action('PostController@update', $post) }}" method="post" @submit.prevent="onSubmitForm">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <p>
            <label>Ieraksta virsraksts <input id="input-title" type="text" name="title" value="{{ old('title', $post->title) }}"></label>
        </p>
        <p>
            <label>Ieraksta teksts
                <textarea id="input-text" name="text">{{ old('text', $post->text) }}</textarea>
            </label>
        </p>
        <p><input type="submit" value="Izveidot"></p>
    </form>
    <div v-cloak v-bind:class="{ 'text-danger': response.status == 422 }" v-if="response">
        <div v-cloak>@{{ response.status }}</div>
        <div>@{{ response.statusText }}</div>
        <div>@{{ response.data }}</div>
    </div>
@stop

    