@extends('adminlte::page')

@section('title', 'Admin - Edit article')

@section('content_header')
    <h1>Edition d'article</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="box">
            
            <div class="box-body">
                <form action="{{route('articles.update', ['article' => $article->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                  <div class="form-group">
                    <label for="titre">Titre de l'article :</label>
                    @if($errors->has('titre'))
                    <div class="text-danger">{{$errors->first('titre')}}</div>
                    @endif
                  <input type="text" name="titre" id="titre" class="form-control {{$errors->has('titre')?'border-danger':''}}" placeholder="Le titre de l'article" value="{{old('titre', $article->titre)}}">
                </div>
                <div class="form-group">
                    <label for="">Contenu :</label>
                    @if($errors->has('contenu'))
                    {{-- @foreach($errors->get('contenu') as $error) --}}
                <div class="text-danger">{{$errors->first('contenu')}}</div>
                {{-- @endforeach --}}
                @endif
                <textarea class="form-control {{$errors->has('contenu')?'border-danger':''}}" name="contenu" id="contenu" rows="3">{{old('contenu', $article->contenu)}}</textarea>
                </div>
                
                <div class="form-group">
                  <img class="img-fluid mb-4" src="{{Storage::disk('articlesThumbs')->url($article->image)}}" alt="">
                    @if($errors->has('image'))
                        @foreach($errors->get('image') as $error)
                        <div class="text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <div class="custom-file"  data-bsfileupload>
                        <label class="custom-file-label" for="customFile">Uploader une image</label>
                        <input name="image" type="file" class="custom-file-input" id="customFile">
                    </div>
                
                </div>

                <div class="form-group">
                  <div class="form-group">
                    <label for="">Choix de la catégorie :</label>
                    @if($errors->has('categorie_id'))
                    <div class="text-danger">{{$errors->first('categorie_id')}}</div>
                    @endif
                    <select class="form-control" name="categorie_id" id="">
                      @foreach($categories as $categorie)
                    <option value="{{$categorie->id}}" @if(old('categorie_id', $article->categorie_id)){{ $article->categorie_id == $categorie->id ? 'selected':''}} @endif>{{$categorie->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                    <label>Choix des tags :</label>
                    @if($errors->has('tags_id'))
                    <div class="text-danger">{{$errors->first('tags_id')}}</div>
                    @endif
                   
                    @foreach($tags as $tag)
                    <div class="form-check my-2">
                    
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="tags_id[]" id="" value="{{$tag->id}}" @foreach(old('tags_id', $article->tags) as $tagarticle)
                        @if(old('tags_id'))
                        {{ $tagarticle == $tag->id ? 'checked':''}}
                        @else
                          {{ $tagarticle->id == $tag->id ? 'checked':''}}
                        @endif
                        @endforeach>
                        {{$tag->name}}
                    </label>
                    
                    </div>
                    @endforeach
                </div>
                    
                  <button type="submit" class="btn btn-warning">Enregistrer</button>
                    <a name="" id="" class="btn btn-danger" href="{{route('articles.index')}}" role="button">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@stop

@push('js')
<script src="{{asset('js/lib/bstrp-change-file-input-value.js')}}"></script>
@endpush

