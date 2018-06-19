@extends('adminlte::page')

@section('title', 'Admin User')

@section('content_header')
  <h1>Profil {{$user->role->name}}</h1>
@stop

@section('content')

  
  <div class="row">
   
    <div class="card col-md-4 m-2">
      <img class="card-img-top" src="holder.js/100x180/" alt="">
      <div class="card-body">
        <h3 class="card-title">{{$user->name}}</h>
        <h4>Poste : </h4><p class="card-text">{{$user->poste}}</p>
        <h4>Role : </h4><p class="card-text">{{$user->role->name}}</p>
      </div>
    </div> 
    <div class="col-md-4 m-2">
      <div class="box">
        <div class="box-header">
          <h3>Actions</h3>
        </div>
        <div class="box-body">
          <a name="" id="" class="btn btn-warning" href="{{route('users.edit', ['user' => $user->id])}}" role="button">Modifier</a>
        <form class="d-inline" action="{{route('users.destroy', ['user' => $user->id])}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger">Supprimer</button>
        </form>
        </div>
      </div>
      
    </div>
   
  </div>
@stop