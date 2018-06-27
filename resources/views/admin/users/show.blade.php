@extends('adminlte::page')

@section('title', 'Admin User')

@section('content_header')
  <h1>Profil {{$user->role->name}}</h1>
@stop

@section('content')

  
  <div class="row">
   
    <div class="card col-md-4 m-2">
      <div class="card-body">
        <h3 class="card-title">{{$user->name}}</h>
        <h4>Poste : </h4><p class="card-text">{{$user->poste}}</p>
        <h4>Role : </h4><p class="card-text">{{$user->role->name}}</p>
        <h4>Miniature :</h4>
        <img src="{{Storage::disk('editeursMini')->url($user->image)}}" alt="">
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
      <div class="card">
        <img class="card-img-top" src="{{Storage::disk('editeursThumbs')->url($user->image)}}" alt="">
      </div>
      
    </div>
   
  </div>
@stop