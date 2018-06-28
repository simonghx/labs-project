@extends('adminlte::page')

@section('title', 'Admin - Edit Content')

@section('content_header')
    <h1>Modifications du titre / sous-titre</h1>
@stop

@section('content')
    <form action="{{route('contents.update', ['content'=>$content->id])}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="">Titre :</label>
          <input type="text" name="titre" id="" class="form-control" placeholder="" value="{{old('titre', $content->titre)}}">
          
        </div>

        <button type="submit" class="btn btn-success" >Enregistrer</button>
    </form>
@stop