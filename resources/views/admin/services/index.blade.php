@extends('adminlte::page')

@section('title', 'Admin - Gestion des services')

@section('content_header')
    <h1>Gestion des services</h1>
@stop

@section('content')

<a name="" id="" class="btn btn-success m-3" href="{{route('services.create')}}" role="button">Ajouter un service</a>
<div class="row">
  @foreach($services as $service)
  <div class="col-md-2 box mx-3" style="overflow:hidden;">
    
      <div class="box-header">
        <div><h4><i class="{{$service->icon}} mr-3"></i>{{$service->name}}</h4></div>
        
      </div>
      <div class="box-body">
        <p>{{$service->content}}</p>
      </div>
      <div class="box-footer">
        <a name="" id="" class="btn btn-warning" href="{{route('services.edit', ['service' => $service->id])}}" role="button">Modifier</a>
        <form class="d-inline" action="{{route('services.destroy', ['service' => $service->id])}}" method="POST">
          @csrf
          @method('DELETE')
          
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    
  </div>
  @endforeach
</div>
    
@stop