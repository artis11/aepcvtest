@extends('layout')

@section('title')
    Jauna ieraksta izveidošana
@stop

@section('content')
    <h1>Jauna ieraksta izveidošana</h1>

    {{ method_field('PUT') }}

    @if (count($errors) > 0)
        <h2>Jūsu ievadītajos datos bija nepilnības</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


    <form action="{{ action('PostController@store') }}" method="post">
        {{ csrf_field() }}
        <p>
            <label>Ieraksta virsraksts <input type="text" name="title" value="{{ old('title') }}"></label>
        </p>
        <p>
            <label>Ieraksta teksts
                <textarea name="text">{{ old('text') }}</textarea>
            </label>
        </p>
        <p><input type="submit" value="Izveidot"></p>
    </form>
@stop

    