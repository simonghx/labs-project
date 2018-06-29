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
        <img class="img-fluid mb-3" src="{{Storage::disk('articlesThumbs')->url($article->image)}}" alt="">
        
        <h2>{{$article->titre}}</h2>
      </div>
      <div class="box-body">
        <h6>{{$article->categorie->name}}</h6>
        <p>{{$article->entete}}</p>
        
      </div>
      <div class="box-footer">
        <h5>{{$article->user->name}}</h5>
        <h6>{{count($article->comments)}} comment{{count($article->comments) === 1 ? '':'s'}}</h6>
        @foreach($article->tags as $tag)
        <span class="badge badge-primary p-2">{{$tag->name}}</span>
        @endforeach
        <hr>
        @can('view', $article)
        <a name="" id="" class="btn btn-light m-3" href="{{route('articles.show', ['article' => $article->id])}}" role="button">Voir</a>
        @endcan
      </div>
    </div>
  </div>
  @endforeach
</div>
    
@stop