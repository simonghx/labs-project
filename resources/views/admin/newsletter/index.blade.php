@extends('adminlte::page')

@section('title', 'Admin - Newsletters')

@section('content_header')
    <h1>Gestion des inscrits à la newsletter</h1>
@stop

@section('content')
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($newsletters as $newsletter)
        <tr>
          <td scope="row">{{$newsletters->perPage()*($newsletters->currentPage()-1)+$loop->iteration}}</td>
          <td>{{$newsletter->letter_email}}</td>
          <td>
            <form action="{{route('newsletter.destroy', ['newsletter' => $newsletter->id])}}" method="POST">
              @csrf
              @method('DELETE')
              <button name="" id="" class="btn btn-danger" type="submits">Supprimer</button>
            </form>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$newsletters->links()}}
@stop