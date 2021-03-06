@extends('adminlte::page')

@section('title', 'Admin - Client')

@section('content_header')
    <h1>Affichage du client et de ses testimoniaux</h1>
@stop

@section('content')
<div class="row">
  <div class="box col-md-6 mx-auto">
    <div class="box-header">
      <img class="d-inline mr-3" src="{{Storage::disk('clientsMini')->url($client->photo)}}" alt="">
      <h3 class="d-inline">{{$client->name}}</h3>
    </div>
    <div class="box-body">
      <h5>Poste : <p class="d-inline ml-3">{{$client->poste}}</p></h5>
    </div>
  </div>
  <div class="box col-md-5 mx-auto">
    <div class="box-header">
      <h3>Actions</h3>
    </div>
    <div class="box-body">
      <a name="" id="" class="btn btn-warning" href="{{route('clients.edit', ['client' => $client->id])}}" role="button">Modifier</a>
      <form class="d-inline" action="{{route('clients.destroy', ['client' => $client->id])}}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger">Supprimer</button>
      </form>
    </div>
  </div>
</div>

@if($client->testimonials->count() != 0)
  <h1>Testimoniaux</h1>
  @foreach($client->testimonials as $testimonial)
    <div class="box col-md-6">
      <div class="box-header">
        #{{$loop->iteration}}
      </div>
      <div class="box-body">
        <p>{{$testimonial->content}}</p>
      </div>
      <div class="box-footer">
        <a name="" id="" class="btn btn-warning" href="{{route('testimoniaux.edit', ['testimonial' => $testimonial->id])}}" role="button">Modifier</a>
        <form class="d-inline" action="{{route('testimoniaux.destroy', ['testimonial' => $testimonial->id])}}" method="POST">
          @csrf
          @method('DELETE')
          
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  @endforeach
@endif
@stop