@extends('layouts.default')

@section('title', 'Movie1')

@section('content')
     
    <h1>Category Movie</h1>

    <div class="ml-auto form-inline my-2 my-lg-0">

      <a class="btn btn-secondary my-sm-0" href="#">Tambah Category</a>
    </div>
     
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
             @foreach($movieCategory as $categori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $categori->category }}</td>
                </tr>
             @endforeach
        </tbody>
    </table>
    
    @if ($movieCategory->lastPage() > 1)
        <ul class="pagination ml-auto">
            <li class="{{ ($movieCategory->currentPage() == 1) ? ' disabled' : '' }} page-item">
                <a class=" page-link " href="{{ $movieCategory->url(1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $movieCategory->lastPage(); $i++)
                <li class="{{ ($movieCategory->currentPage() == $i) ? ' active' : '' }} page-item">
                    <a class=" page-link " href="{{ $movieCategory->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ ($movieCategory->currentPage() == $movieCategory->lastPage()) ? ' disabled' : '' }} page-item">
                <a href="{{ $movieCategory->url($movieCategory->currentPage()+1) }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    @endif
@stop