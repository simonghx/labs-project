@extends('adminlte::page')

@section('title', 'Admin - Create service')

@section('content_header')
    <h1>Création d'un service</h1>
@stop

@section('content')
<div class="box col-md-5">
  <div class="box-body">
    <form action="{{route('services.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="">Nom du service</label>
        @if($errors->has('name'))
          <div class="text-danger">{{$errors->first('name')}}</div>
        @endif
        <input type="text" name="name" id="" class="form-control" value="{{old('name')}}" >
      </div>

      <div class="form-group">
        <label for="">Icone du service</label>
        @if($errors->has('icon'))
          <div class="text-danger">{{$errors->first('icon')}}</div>
        @endif
        <input type="text" name="icon" id="" class="form-control" value="{{old('icon')}}" >
      </div>

      <div class="form-group">
        <label for="">Description :</label>
        @if($errors->has('content'))
        {{-- @foreach($errors->get('contenu') as $error) --}}
        <div class="text-danger">{{$errors->first('content')}}</div>
        {{-- @endforeach --}}
        @endif
        <textarea class="form-control {{$errors->has('content')?'border-danger':''}}" name="content" id="content" rows="3">{{old('content')}}</textarea>
      </div>

      <button type="submit" class="btn btn-success">Enregistrer</button>
      <a class="btn btn-danger" href="{{route('services.index')}}" role="button">Annuler</a>
    </form>
  </div>
</div>
@stop