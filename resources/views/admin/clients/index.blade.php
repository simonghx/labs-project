@extends('adminlte::page')

@section('title', 'Admin Clients')

@section('content_header')
    <h1>Gestion des clients</h1>
@stop

@section('content')

  <a name="" id="" class="btn btn-success" href="{{route('clients.create')}}" role="button">Ajouter un client</a>

  <div class="row">
    <table class="table col-md-8 m-4">
      <thead>
        <tr>
          <th>Miniature</th>
          <th>Client</th>
          <th>Poste</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($clients as $client)
        <tr>
          <td scope="row"><img src="{{Storage::disk('clientsMini')->url($client->photo)}}" alt=""></td>
          <td><h4>{{$client->name}}</h4></td>
          <td><p>{{$client->poste}}</p></td>
          <td><a name="" id="" class="btn btn-secondary" href="{{route('clients.show', ['client' => $client->id])}}" role="button">Voir</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$clients->links()}}
  </div>
@stop