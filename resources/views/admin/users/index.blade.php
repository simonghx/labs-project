@extends('adminlte::page')

@section('title', 'Admin Users')

@section('content_header')
    <h1>Gestion des Editeurs</h1>
@stop

@section('content')

  
  <div class="row">
    @foreach($users as $user)
    <div class="card col-md-4 m-2">
      <img class="card-img-top" src="holder.js/100x180/" alt="">
      <div class="card-body">
        <h3 class="card-title">{{$user->name}}</h>
        <h4>Poste : </h4><p class="card-text">{{$user->poste}}</p>
        <h4>Role : </h4><p class="card-text">{{$user->role->name}}</p>
      </div>
      <div class="card-footer">
        <a name="" id="" class="btn btn-secondary" href="{{route('users.show', ['user' => $user->id])}}" role="button">Voir</a>
      </div>
    </div>  
    @endforeach
  </div>
@stop