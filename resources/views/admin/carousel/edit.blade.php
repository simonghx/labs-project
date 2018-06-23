@extends('adminlte::page')

@section('title', 'Admin - Update Carousel')

@section('content_header')
    <h1>Modification d'une bannière</h1>
@stop

@section('content')
  <form action="{{route('carousel.update', ['carousel' => $carousel->id])}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
      <div class="form-group">
        <label for="name">Nom de l'image :</label>
        @if($errors->has('name'))
        <div class="text-danger">{{$errors->first('name')}}</div>
        @endif
      <input type="text" name="name" id="name" class="form-control {{$errors->has('name')?'border-danger':''}}" placeholder="Le nom de l'image" value="{{old('name', $carousel->name)}}">
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

      <button type="submit" class="btn btn-warning">Enregistrer</button>
        <a name="" id="" class="btn btn-danger" href="{{route('carousel.index')}}" role="button">Cancel</a>
</form>
@stop

@push('js')
<script src="{{asset('js/lib/bstrp-change-file-input-value.js')}}"></script>
@endpush
