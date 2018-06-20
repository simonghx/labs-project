@extends('adminlte::page')

@section('title', 'Admin Users')

@section('content_header')
    <h1>Gestion des éditeurs</h1>
@stop

@section('content')

  <a name="" id="" class="btn btn-success" href="{{route('users.create')}}" role="button">Ajouter un éditeur</a>

  <div class="row">
    @foreach($users as $user)
    <div class="card col-md-4 m-2">
      <img class="card-img-top" src="holder.js/100x180/" alt="">
      <div class="card-body">
        <h3 class="card-title">{{$user->name}}</h3>
        <img src="{{Storage::disk('editeursThumbs')->url($user->image)}}" alt="">
        <p class="card-text"><h5>Poste : </h5>{{$user->poste}}</p>
        <p class="card-text"><h5>Role : </h5>{{$user->role->name}}</p>
      </div>
      <div class="card-footer">
        <a name="" id="" class="btn btn-secondary" href="{{route('users.show', ['user' => $user->id])}}" role="button">Voir</a>
      </div>
    </div>  
    @endforeach
  </div>
@stop