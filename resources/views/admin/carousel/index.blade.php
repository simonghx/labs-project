@extends('adminlte::page')

@section('title', 'Admin - Carousel')

@section('content_header')
    <h1>Gestion du carousel</h1>
@stop

@section('content')
<a name="" id="" class="btn btn-success m-3" href="{{route('carousel.create')}}" role="button">Ajouter une bannière</a>
<div class="row">
@foreach($carousels as $carousel)
  <div class="col-md-3">
    <div class="card">
      <img class="card-img-top" src="{{Storage::disk('carousel')->url($carousel->image)}}" alt="{{$carousel->name}}" srcset="">
      <div class="card-body">
        <h4 class="card-title"># {{$loop->iteration}}</h4>
        
      </div>
      <div class="card-footer">
        <a name="" id="" class="btn btn-warning" href="{{route('carousel.edit', ['carousel' => $carousel->id])}}" role="button">Changer la bannière</a>
        <form class="d-inline" action="{{route('carousel.destroy', ['carousel' => $carousel->id])}}" method="POST">
          @csrf
          @method('DELETE')
          
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
@endforeach
</div>
@stop