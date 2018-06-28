@extends('adminlte::page')

@section('title', 'Admin - contenus')

@section('content_header')
    <h1>Gestion des contenus du site</h1>
@stop

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Contenu</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contents as $content)
        <tr>
          <td scope="row">{{$loop->iteration}}</td>
          <td>{{$content->name}}</td>
          <td>
            @if($content->titre != null)
              {{$content->titre}}
            @elseif($content->image != null)
              {{$content->image}}
            @else
              {{$content->texte}}
            @endif
          </td>
          
          <td>
            <a name="" id="" class="btn btn-warning" href="{{route('contents.edit', ['content'=>$content->id])}}" role="button">Modifier</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
@stop