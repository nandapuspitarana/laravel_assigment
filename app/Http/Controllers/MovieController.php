<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Movie;

class MovieController extends Controller
{
	private $movie;

	private $filesystem;

    public function __construct(Movie $movie, Filesystem $filesystem)
    {
        $this->movie = $movie;
        $this->filesystem = $filesystem;
    }

    public function index()
    {
        $movies = $this->movie->with('movieCategories')->orderBy('id','ASC')->paginate(10);

        return view('movie.index', compact('movies'));
    }

    public function create()
    {
        return view('movie.create');
    }
}
