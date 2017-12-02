@extends('layouts.default')

@section('title', 'Edit Movie')

@section('content')

    <form class="container" enctype="multipart/form-data" method="POST" action="{{ route('movie.update', $movie->id) }}">
    <input type="hidden" name="_method" value="put" />
    {{ csrf_field() }}

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" value="{{ $movie->title }}" class="form-control" placeholder="Judul film">
    </div>

    <div class="form-group">
      <label>Category</label>
      <select name="categories_id" class="form-control">
        <option>Choose...</option>
        @foreach( $movieCategory as $categori )
            @if( $categori->id == $movie->categories_id )
                <option value="{{ $categori->id }}" selected>{{ $categori->category }}</option> 
            @else
                <option value="{{ $categori->id }}" >{{ $categori->category }}</option>
            @endif
        @endforeach
      </select>
    </div>

    <div class="form-group">
        <label>Tahun Realese</label>
        <input type="text" name="year" value="{{ $movie->year }}" class="form-control" placeholder="Tahun Pembuatan">
    </div>

    <div class="form-group">
        <label>Descripsi film</label>
        <input type="text" name="description" value="{{ $movie->description }}" class="form-control" placeholder="Deskripsi Film">
    </div>

    <div class="form-group">
        <label>Photo(Kosongkan jika tidak diganti)</label>
        <input type="file" name="photo"  class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop