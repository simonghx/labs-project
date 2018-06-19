@extends('adminlte::page')

@section('title', 'Admin Users')

@section('content_header')
    <h1>Gestion des Editeurs</h1>
@stop

@section('content')

  @foreach($users as $user)
    <div class="card">
      <img class="card-img-top" src="holder.js/100x180/" alt="">
      <div class="card-body">
        <h3 class="card-title">{{$user->name}}</h>
        <h4>Poste : </h4><p class="card-text">{{$user->poste}}</p>
        <h4>Role : </h4><p class="card-text">{{$user->role->slug}}</p>
      </div>
    </div>  
  @endforeach
@stop