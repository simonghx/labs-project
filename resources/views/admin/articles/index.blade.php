@extends('adminlte::page')

@section('title', 'Admin - Gestion des articles')

@section('content_header')
    <h1>Gestion des articles</h1>
@stop

@section('content')
<a name="" id="" class="btn btn-success m-3" href="{{route('articles.create')}}" role="button">Ajouter un article</a>
<div class="row">
  
  @foreach($articles as $article)
  <div class="col-md-4">
    <div class="box">
      <div class="box-header">
        {{$article->titre}}
      </div>
      <div class="box-body">
        {{$article->entete}}
      </div>
      <div class="box-footer">
        {{$article->user->name}}
        <hr>
        @foreach($article->tags as $tag)
        <span class="badge badge-primary">{{$tag->name}}</span>
        @endforeach
        <hr>
        <a name="" id="" class="btn btn-light m-3" href="{{route('articles.show', ['article' => $article->id])}}" role="button">Voir</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
    
@stop