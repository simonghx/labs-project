@extends('adminlte::page')

@section('title', 'Admin - Create Category')

@section('content_header')
    <h1>Création d'une catégorie</h1>
@stop

@section('content')
<div class="box col-md-5">
  <div class="box-body">
    <form action="{{route('categories.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="">Nom de la catégorie</label>
        <input type="text" name="name" id="" class="form-control" value="{{old('name')}}" >
      </div>

      <button type="submit" class="btn btn-success">Enregistrer</button>
      <a class="btn btn-danger" href="{{route('catandtags')}}" role="button">Annuler</a>
    </form>
  </div>
</div>
@stop