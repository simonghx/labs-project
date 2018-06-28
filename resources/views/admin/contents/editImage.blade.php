@extends('adminlte::page')

@section('title', 'Admin - Edit Content')

@section('content_header')
    <h1>Modifications de l'image</h1>
@stop

@section('content')
    <form action="{{route('contents.update', ['content'=>$content->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
        <img src="" alt="">
        @if($errors->has('image'))
            @foreach($errors->get('image') as $error)
            <div class="text-danger">{{$error}}</div>
            @endforeach
        @endif
        <div class="custom-file"  data-bsfileupload>
            <label class="custom-file-label" for="customFile" data-bsfileupload>Uploader une image</label>
            <input name="image" type="file" class="custom-file-input" id="customFile" data-bsfileupload>
        </div>
    
    </div>

        <button type="submit" class="btn btn-success" >Enregistrer</button>
    </form>
@stop

@push('js')
<script src="{{asset('js/lib/bstrp-change-file-input-value.js')}}"></script>
@endpush