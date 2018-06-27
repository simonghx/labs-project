@extends('adminlte::page')

@section('title', 'Admin - Edit service')

@section('content_header')
    <h1>Modification d'un service</h1>
@stop

@section('content')
<div class="row">
  <div class="box col-md-5">
    <div class="box-body">
      <form action="{{route('services.update', ['service' => $service->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="">Nom du service</label>
          @if($errors->has('name'))
            <div class="text-danger">{{$errors->first('name')}}</div>
          @endif
          <input type="text" name="name" id="" class="form-control" value="{{old('name', $service->name)}}" >
        </div>
  
        <div class="form-group">
          <label for="">Icone du service</label>
          @if($errors->has('icon'))
            <div class="text-danger">{{$errors->first('icon')}}</div>
          @endif
          <input type="text" name="icon" id="" class="form-control" value="{{old('icon', $service->icon)}}" >
        </div>
  
        <div class="form-group">
          <label for="">Description :</label>
          @if($errors->has('content'))
          {{-- @foreach($errors->get('contenu') as $error) --}}
          <div class="text-danger">{{$errors->first('content')}}</div>
          {{-- @endforeach --}}
          @endif
          <textarea class="form-control {{$errors->has('content')?'border-danger':''}}" name="content" id="content" rows="3">{{old('content', $service->content)}}</textarea>
        </div>
  
        <button type="submit" class="btn btn-success">Enregistrer</button>
  
        <a class="btn btn-danger" href="{{route('services.index')}}" role="button">Annuler</a>
      </form>
    </div>
  </div>
  <div class="col-md-5 mx-auto">
    <table class="table">
      
      <tbody>
        @foreach($icons as $icon)
        <tr>
          <td scope="row"><i class="{{$icon->name}}"></i></td>
          <td>{{$icon->name}}</td>
        </tr>
        
        @endforeach

      </tbody>
    </table>
    {{ $icons->links()}}
      
      
      
  </div>
</div>
@stop