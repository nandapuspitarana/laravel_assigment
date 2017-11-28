@extends('layouts.default')

@section('title', 'Edit Siswa')

@section('content')

    <form class="container" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="_method" value="put" />
    {{ csrf_field() }}

    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="title" value="{{ $movie->title }}" class="form-control" placeholder="Masukan Nama">
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="year" value="{{ $movie->year }}" class="form-control" placeholder="Masukan Alamat">
    </div>

    <div class="form-group">
        <label>Umur</label>
        <input type="text" name="description" value="{{ $movie->description }}" class="form-control" placeholder="Masukan Umur">
    </div>

    <div class="form-group">
        <label>Photo(Kosongkan jika tidak diganti)</label>
        <input type="file" name="photo"  class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop