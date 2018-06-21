@extends('adminlte::page')

@section('title', 'Admin - Create Tag')

@section('content_header')
    <h1>Création d'un tag</h1>
@stop

@section('content')
<div class="box col-md-5">
  <div class="box-body">
    <form action="{{route('tags.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="">Nom du tag</label>
        <input type="text" name="name" id="" class="form-control" value="{{old('name')}}" >
      </div>

      <button type="submit" class="btn btn-success">Enregistrer</button>
      <a class="btn btn-danger" href="{{route('catandtags')}}" role="button">Annuler</a>
    </form>
  </div>
</div>
@stop