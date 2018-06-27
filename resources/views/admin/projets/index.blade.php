@extends('adminlte::page')

@section('title', 'Admin - Gestion des projets')

@section('content_header')
    <h1>Gestion des projets</h1>
@stop

@section('content')

<a name="" id="" class="btn btn-success m-3" href="{{route('projets.create')}}" role="button">Ajouter un projet</a>
<div class="row">
  @foreach($projets as $projet)
  <div class="col-md-2">
    <div class="box container-fluid">
      <div class="box-header">
        <img class="img-fluid mb-3" src="{{Storage::disk('projetsThumbs')->url($projet->image)}}" alt="">
        <h4><i class="{{$projet->icon}} mr-3"></i>{{$projet->titre}}</h4>
      </div>
      <div class="box-body">
        <p>{{$projet->desc}}</p>
      </div>
      <div class="box-footer">
        <a name="" id="" class="btn btn-primary" href="{{route('projets.show', ['projet' => $projet->id])}}" role="button">Voir</a>
        
      </div>
    </div>
  </div>
  @endforeach
</div>
    
@stop