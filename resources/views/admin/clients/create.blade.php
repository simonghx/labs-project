@extends('adminlte::page')

@section('title', 'Admin - Create Client')

@section('content_header')
    <h1>Ajout d'un client</h1>
@stop

@section('content')
<div class="row">
<div class="col-md-8">
  <div class="box">
      
      <div class="box-body">
          <form action="{{route('clients.store')}}" method="post" enctype="multipart/form-data">
          @csrf

            <div class="form-group">
              <label for="">Nom du client</label>
              @if($errors->has('name'))
              <div class="text-danger">{{$errors->first('name')}}</div>
              @endif
              <input type="text" name="name" id="" class="form-control {{$errors->has('name')?'border-danger':''}}" placeholder="" value="{{old('name')}}">
              </div>
              <div class="form-group">
                <label for="">Poste du client</label>
                @if($errors->has('poste'))
                  <div class="text-danger">{{$errors->first('poste')}}</div>
                @endif
              <input class="form-control {{$errors->has('poste')?'border-danger':''}}" type="text" name="poste" id="" placeholder="" value="{{old('poste')}}">
              </div>
              
              <div class="form-group">
                    <img src="" alt="">
                    @if($errors->has('photo'))
                        @foreach($errors->get('photo') as $error)
                        <div class="text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    <div class="custom-file"  data-bsfileupload>
                        <label class="custom-file-label" for="customFile">Uploader une photo</label>
                        <input name="photo" type="file" class="custom-file-input" id="customFile">
                    </div>
                    
                </div>
              
            
            <button type="submit" class="btn btn-warning m-2">Ajouter</button>
              <a name="" id="" class="btn btn-danger" href="{{route('clients.index')}}" role="button">Cancel</a>
          </form>
      </div>
  </div>
</div>
@stop

@push('js')
<script src="{{asset('js/lib/bstrp-change-file-input-value.js')}}"></script>
@endpush