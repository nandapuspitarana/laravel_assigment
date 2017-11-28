@extends('layouts.default')

@section('title', 'Tambah Movie')

@section('content')

    <form class="container" enctype="multipart/form-data" method="POST" action="{{ route('movie.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Judul Film">
    </div>

    <div class="form-group">
      <label>Category</label>
      <select name="categories_id" class="form-control">
        <option selected>Choose...</option>
        @foreach($movieCategory as $categori)
        <option value="{{ $categori->id }}">{{ $categori->category }}</option>
        @endforeach
      </select>
    </div>
    
    <div class="form-group">
        <label>Tahun</label>
        <input type="text" name="year" class="form-control" placeholder="Tahun Realese">
    </div>

    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" class="form-control" placeholder="Deskripsi Film">
    </div>

    <div class="form-group">
        <label>Photo</label>
        <input type="file" name="photo" class="form-control">
       
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <br/>
    
    @if($errors->any())
        <div class="container alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
        </div>
    @endif

@stop