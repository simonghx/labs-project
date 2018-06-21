@extends('adminlte::page')

@section('title', 'Admin - Update Tag')

@section('content_header')
    <h1>Modification d'un tag</h1>
@stop

@section('content')

<div class="box col-md-5">
  <div class="box-body">
    <form action="{{route('tags.update', ['tag' => $tag->id])}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="">Nom du tag</label>
        <input type="text" name="name" id="" class="form-control" value="{{old('name', $tag->name)}}" >
      </div>

      <button type="submit" class="btn btn-success">Enregistrer</button>
      <a class="btn btn-danger" href="{{route('catandtags')}}" role="button">Annuler</a>
    </form>
  </div>
</div>
@stop