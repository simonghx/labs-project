@extends('adminlte::page')

@section('title', 'Admin - Show projet')

@section('content_header')
    <h1>Affichage projet</h1>
@stop

@section('content')
    <div class="box col-md-5">
      <div class="box-header">
        <img class="img-fluid mb-3" src="{{Storage::disk('projetsThumbs')->url($projet->image)}}" alt="">
        <h2><i class="{{$projet->icon}} mr-3"></i>{{$projet->titre}}</h2>
      </div>
      <div class="box-body">
        <p>{{$projet->content}}</p>
      </div>
      <div class="box-footer">
        <a name="" id="" class="btn btn-warning" href="{{route('projets.edit', ['projet' => $projet->id])}}" role="button">Modifier</a>
        <form class="d-inline" action="{{route('projets.destroy', ['projet' => $projet->id])}}" method="POST">
          @csrf
          @method('DELETE')
          
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
    
    
@stop