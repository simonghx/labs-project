@extends('adminlte::page')

@section('title', 'Admin - Update Category')

@section('content_header')
    <h1>Modification d'une catégorie</h1>
@stop

@section('content')

<div class="box col-md-5">
  <div class="box-body">
    <form action="{{route('categories.update', ['categorie' => $categorie->id])}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="">Nom de la catégorie</label>
        <input type="text" name="name" id="" class="form-control" value="{{old('name', $categorie->name)}}" >
      </div>

      <button type="submit" class="btn btn-success">Enregistrer</button>
      <a class="btn btn-danger" href="{{route('catandtags')}}" role="button">Annuler</a>
    </form>
  </div>
</div>
@stop