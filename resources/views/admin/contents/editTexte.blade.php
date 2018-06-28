@extends('adminlte::page')

@section('title', 'Admin - Edit Content')

@section('content_header')
    <h1>Modifications du texte</h1>
@stop

@section('content')
    <form action="{{route('contents.update', ['content'=>$content->id])}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="">Contenu texte :</label>
          <textarea class="form-control" name="texte" id="" rows="5">{{old('texte', $content->texte)}}</textarea>
        </div>

        <button type="submit" class="btn btn-success" >Enregistrer</button>
    </form>
@stop