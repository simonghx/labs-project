@extends('adminlte::page')

@section('title', 'Admin - Update Testimonial')

@section('content_header')
    <h1>Modifier un testimonial</h1>
@stop

@section('content')
<div class="col-md-5">
    <form action="{{route('testimoniaux.update', ['testimonial' => $testimonial->id])}}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="">Contenu du testimonial</label>
          @if($errors->has('content'))
          <div class="text-danger">{{$errors->first('content')}}</div>
          @endif
        <textarea class="form-control" name="content" id="" rows="3">{{old('content', $testimonial->content)}}</textarea>
      </div>

      <div class="form-group">
        <label for="">Choix du client :</label>
        @if($errors->has('client_id'))
        <div class="text-danger">{{$errors->first('client_id')}}</div>
        @endif
        <select class="form-control" name="client_id" id="">
          @foreach($clients as $client)
        <option value="{{$client->id}}">{{$client->name}}</option>
          @endforeach
        </select>
      </div>
      
      <button type="submit" class="btn btn-success">Enregistrer</button>
      <a class="btn btn-danger" href="{{route('clients.index')}}" role="button">Annuler</a>
    </form>
    </div>
@stop