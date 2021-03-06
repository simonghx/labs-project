@extends('adminlte::page')

@section('title', 'Admin User')

@section('content_header')
    <h1>Création d'un membre de la team</h1>
@stop

@section('content')
<div class="row">
<div class="col-md-8">
  <div class="box">
      
      <div class="box-body">
          <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="">Nom de l'éditeur</label>
              @if($errors->has('name'))
              <div class="text-danger">{{$errors->first('name')}}</div>
              @endif
              <input type="text" name="name" id="" class="form-control {{$errors->has('name')?'border-danger':''}}" placeholder="Le nom de l'éditeur" value="{{old('name')}}">
              </div>
              <div class="form-group">
                <label for="">Email de l'éditeur</label>
                @if($errors->has('email'))
                  <div class="text-danger">{{$errors->first('email')}}</div>
                @endif
              <input class="form-control {{$errors->has('email')?'border-danger':''}}" type="text" name="email" id="" placeholder="L'email de l'éditeur" value="{{old('email')}}">
              </div>
              <div class="form-group">
                <label for="">Poste de l'éditeur</label>
                @if($errors->has('poste'))
                  <div class="text-danger">{{$errors->first('poste')}}</div>
                @endif
              <input class="form-control {{$errors->has('poste')?'border-danger':''}}" type="text" name="poste" id="" placeholder="Le poste de l'éditeur" value="{{old('poste')}}">
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
              @if($errors->has('role_id'))
                  <div class="text-danger">{{$errors->first('role_id')}}</div>
                @endif
              @foreach($roles as $role)
              <div class="form-check">
                
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="role_id" id="" value="{{$role->id}}">
                  {{$role->name}}
                </label>
                
              </div>
              @endforeach
              
            
            <button type="submit" class="btn btn-warning m-2">Ajouter</button>
              <a name="" id="" class="btn btn-danger" href="{{route('users.index')}}" role="button">Cancel</a>
          </form>
      </div>
  </div>
</div>
@stop

@push('js')
<script src="{{asset('js/lib/bstrp-change-file-input-value.js')}}"></script>
@endpush