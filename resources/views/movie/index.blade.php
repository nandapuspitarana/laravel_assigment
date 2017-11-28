@extends('layouts.default')

@section('title', 'Movie1')

@section('content')
     
    <h1>Data Movie</h1>
    <form method="GET" action="" class="form-inline my-2 my-md-0 mx-3">
        <input name="keyword" class="form-control" type="text" placeholder="Search" aria-label="Search">
    </form>

    <div class="form-inline my-2 my-lg-0">

      <a class="btn btn-primary my-sm-0" href="#">Tambah Data</a>
    </div>
     
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Year</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
             @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>
                        @if($movie->photo)
                            <img 
                                src="{{ $movie->photo }}"
                                width="100" 
                                height="100">
                        @else
                           <img 
                                src="/photos/no-avatar.png"
                                width="100" 
                                height="100">
                        @endif
                        
                    </td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->movieCategories->category }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->description }}</td>
                </tr>
             @endforeach
        </tbody>
    </table>

    @if ($movies->lastPage() > 1)
        <ul class="pagination ml-auto">
            <li class="{{ ($movies->currentPage() == 1) ? ' disabled' : '' }} page-item">
                <a class=" page-link " href="{{ $movies->url(1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $movies->lastPage(); $i++)
                <li class="{{ ($movies->currentPage() == $i) ? ' active' : '' }} page-item">
                    <a class=" page-link " href="{{ $movies->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ ($movies->currentPage() == $movies->lastPage()) ? ' disabled' : '' }} page-item">
                <a href="{{ $movies->url($movies->currentPage()+1) }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    @endif
@stop