@extends('layout')

@section('title')
    Mana Dienasgrāmata
@stop

@section('content')
    <h4><a href="{{ action('PostController@index') }}">Ieraksti</a></h4>
@stop
