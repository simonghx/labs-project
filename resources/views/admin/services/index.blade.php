@extends('adminlte::page')

@section('title', 'Admin - Gestion des services')

@section('content_header')
    <h1>Gestion des services</h1>
@stop

@section('content')

<div class="row">
  <div class="col-md-4">
    @foreach($services as $service)
    <div class="icon-box">
      <div class="icon">
        <i class="{{$service->icon}}"></i>
      </div>
      <div class="icon-box-text">
        <h2>{{$service->name}}</h2>
        <p>{{$service->content}}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
    
@stop