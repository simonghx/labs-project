@extends('adminlte::page')

@section('title', 'Admin Testimonial')

@section('content_header')
    <h1>Ajouter un testimonial</h1>
@stop

@section('content')
    <form action="{{route('testimoniaux.store')}}" method="POST">
      @csrf

    
        
      <div class="form-group">
        <label for="">Contenu du testimonial</label>
          @if($errors->has('content'))
          <div class="text-danger">{{$errors->first('content')}}</div>
          @endif
        <textarea class="form-control" name="content" id="" rows="3">{{old('content')}}</textarea>
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
      
      <button class="btn btn-success" type="submit">Ajouter</button>
      <a name="" id="" class="btn btn-danger d-inline" href="{{route('clients.index')}}" role="button">Annuler</a>
    </form>
@stop