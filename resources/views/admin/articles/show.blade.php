@extends('adminlte::page')

@section('title', 'Admin - Affiche article')

@section('content_header')
    <h1>Affichage de l'article</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-4">
    <div class="box">
      <div class="box-header">
        <img class="img-fluid mb-3" src="{{Storage::disk('articlesThumbs')->url($article->image)}}" alt="">
        
        <h2>{{$article->titre}}</h2>
      </div>
      <div class="box-body">
        
        <p>{{$article->contenu}}</p>
        
      </div>
      <div class="box-footer">
        <h6>{{$article->user->name}}</h6>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box">
      <div class="box-header">
        <h3>Catégorie</h3>
      </div>
      <div class="box-body">
        <h6>{{$article->categorie->name}}</h6>
      </div>
    </div>
    <div class="box">
      <div class="box-header">
        <h3>Tags</h3>
      </div>
      <div class="box-body">
        @foreach($article->tags as $tag)
        <span class="badge badge-primary p-2">{{$tag->name}}</span>
        @endforeach
      </div>
    </div>
    <div class="box">
      <div class="box-header">
        <h3>Comments</h3>
      </div>
      @foreach($article->comments as $comment)
      <div class="box-body">
          <div class="avatar">
              <img src="{{Storage::disk('avatars')->url($comment->image)}}" alt="">
          </div>
          <div class="commetn-text">
              <h3>{{$comment->name}} | {{$comment->email}} | {{$article->created_at->format('d M Y')}}</h3>
              <p>{{$comment->content}}</p>
          </div>
        
      </div>
      @endforeach
    </div>
  </div>
  <div class="col-md-4">
    <div class="box">
      <div class="box-header">
        <h3>Actions</h3>
      </div>
      <div class="box-body">
        @can('update', $article)
        <a name="" id="" class="btn btn-warning" href="{{route('articles.edit', ['article' => $article->id])}}" role="button">Modifier</a>
        @endcan
        <form class="d-inline" action="{{route('articles.destroy', ['article' => $article->id])}}" method="POST">
          @csrf
          @method('DELETE')
           @can('delete', $article)
          <button type="submit" class="btn btn-danger">Supprimer</button>
          @endcan
        </form>
      </div>
    </div>
    
  </div>
</div>


    
@stop