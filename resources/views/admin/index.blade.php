@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link rel="stylesheet" href="sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
    <h1>Bienvendid@ Colaborador/a de <b>{{$empresa->nombre_empresa}}</b></h1>
    <hr>
@stop

@section('content')
@stop

@section('css')
@stop

@section('js')
{{-- @endif --}}

@stop