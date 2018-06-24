@extends('adminlte::page')

@section('title', 'Admin - Create projet')

@section('content_header')
    <h1>Modification d'un projet</h1>
@stop

@section('content')
<div class="box col-md-5">
  <div class="box-body">
    <form action="{{route('projets.store')}}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="">Titre du projet</label>
        @if($errors->has('titre'))
          <div class="text-danger">{{$errors->first('titre')}}</div>
        @endif
        <input type="text" name="titre" id="" class="form-control" value="{{old('titre', $projet->titre)}}" >
      </div>

       <div class="form-group">
        <img src="" alt="">
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
        <label for="">Icone du projet</label>
        @if($errors->has('icon'))
          <div class="text-danger">{{$errors->first('icon')}}</div>
        @endif
        <input type="text" name="icon" id="" class="form-control" value="{{old('icon', $projet->icon)}}" >
      </div>

      <div class="form-group">
        <label for="">Description :</label>
        @if($errors->has('content'))
        {{-- @foreach($errors->get('contenu') as $error) --}}
        <div class="text-danger">{{$errors->first('content')}}</div>
        {{-- @endforeach --}}
        @endif
        <textarea class="form-control {{$errors->has('content')?'border-danger':''}}" name="content" id="content" rows="3">{{old('content', $projet->content)}}</textarea>
      </div>

      <button type="submit" class="btn btn-success">Enregistrer</button>
      <a class="btn btn-danger" href="{{route('projets.index')}}" role="button">Annuler</a>
    </form>
  </div>
</div>
@stop

@push('js')
<script src="{{asset('js/lib/bstrp-change-file-input-value.js')}}"></script>
@endpush