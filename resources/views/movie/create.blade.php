@extends('layouts.default')

@section('title', 'Tambah Movie')

@section('content')

    <form class="container" enctype="multipart/form-data" method="POST" action="{{ route('movie.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Title Movie">
        @if($errors->first('title'))
            <p style="color:red">{{ $errors->first('title') }}</p>
        @endif
    </div>

    <div class="form-group">
      <label>Category</label>
      <select name="categories_id" class="form-control">
        <option selected>Choose...</option>
        @foreach($movieCategory as $categori)
        <option value="{{ $categori->id }}"> {{ $categori->category }} </option>
        @endforeach
      </select>
    </div>
    
    <div class="form-group">
        <label>Year</label>
        <input type="text" name="year" class="form-control" placeholder="Movie Realese">
        @if($errors->first('year'))
            <p style="color:red">{{ $errors->first('year') }}</p>
        @endif
    </div>

    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" class="form-control" placeholder="Sinopsis">
        @if($errors->first('description'))
            <p style="color:red">{{ $errors->first('description') }}</p>
        @endif
    </div>

    <div class="form-group">
        <label>Photo</label>
        <input type="file" name="photo" class="form-control">
       
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop