@extends('layouts.default')

@section('title', 'Tambah Category')

@section('content')

    <form class="container" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Category</label>
        <input type="text" name="category" class="form-control" placeholder="Category Movie">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop