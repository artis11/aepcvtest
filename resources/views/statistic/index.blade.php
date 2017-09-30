@extends('layout')

@section('title')
    Statistika
@stop

@section('js')
    <script src="{{ asset('js/statistic.js') }}"></script>
@stop

@section('content')
    <canvas id="bar-chart"></canvas>
@stop
