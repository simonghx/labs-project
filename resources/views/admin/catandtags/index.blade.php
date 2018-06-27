@extends('adminlte::page')

@section('title', 'Admin Catégories & Tags')

@section('content_header')
    <h1>Gestion des catégories et des tags</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="box">
      <a name="" id="" class="btn btn-success m-3" href="{{route('categories.create')}}" role="button">Créer une catégorie</a>
    <div class="box-header">
      <h3>Catégories</h3>
    </div>
    <div class="box-body">
      <table class="table table-light">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Nombre d'articles</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $categorie)
          <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{$categorie->name}}</td>
            <td></td>
            <td>
              @can('admin')
              <a name="" id="" class="btn btn-warning" href="{{route('categories.edit', ['categorie' => $categorie->id])}}" role="button">Modifier</a>
              @endcan
              <form class="d-inline" action="{{route('categories.destroy', ['categorie' => $categorie->id])}}" method="POST">
                @csrf
                @method('DELETE')
                @can('admin')
                <button type="submit" class="btn btn-danger">Supprimer</button>
                @endcan
              </form>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
  </div>
  <div class="col-md-6">
    <div class="box">
      <a name="" id="" class="btn btn-success m-3" href="{{route('tags.create')}}" role="button">Créer un tag</a>
    <div class="box-header">
      <h3>Tags</h3>
    </div>
    <div class="box-body">
      <table class="table table-light">
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Nombre d'articles</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tags as $tag)
          <tr>
            <td scope="row">{{$loop->iteration}}</td>
            <td>{{$tag->name}}</td>
            <td></td>
            <td>
              @can('admin')
              <a name="" id="" class="btn btn-warning" href="{{route('tags.edit', ['tag' => $tag->id])}}" role="button">Modifier</a>
              @endcan
              <form class="d-inline" action="{{route('tags.destroy', ['tag' => $tag->id])}}" method="POST">
                @csrf
                @method('DELETE')
                @can('admin')
                <button type="submit" class="btn btn-danger">Supprimer</button>
                @endcan
              </form>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
  </div>
</div>
@stop