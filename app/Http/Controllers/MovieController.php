<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Http\Requests\MovieRequest;
use Intervention\Image\ImageManager;
use App\Movie;
use App\MovieCategories;

class MovieController extends Controller
{
	private $movie;
	
	private $movieCategory;

	private $filesystem;

	private $imageManager;

    public function __construct(Movie $movie, MovieCategories $movieCategory, Filesystem $filesystem, ImageManager $imageManager)
    {
        $this->movie = $movie;
        $this->movieCategory = $movieCategory;
        $this->filesystem = $filesystem;
        $this->imageManager = $imageManager;
    }

    public function index()
    {
        $movies = $this->movie->with('movieCategories')->orderBy('id','ASC')->paginate(10);

        return view('movie.index', compact('movies'));
    }

    public function create()
    {
    	$movieCategory = $this->movieCategory->all();

        return view('movie.create', compact('movieCategory'));
    }

    public function store(MovieRequest $request)
    {
    	
        // dapetin data inputan kecuali photo
        $movie = $request->except("photo");
           // cek jika ngupload photo
        if($request->hasFile('photo')) {
            $movie['photo'] = $this->generatePhoto($request->file('photo'), $request->except('photo')); 
        }
        $this->movie->create($movie);

        session()->flash('success_message', 'Data tersimpan');

        return redirect('/admin');
    }

    private function generatePhoto($photo, $data)
    {
        $filename = date('YmdHis').'-'.snake_case($data['title']).".".$this->filesystem->extension($photo->getClientOriginalName());
        $path = public_path("photos/").$filename;

        $this->imageManager->make($photo->getRealPath())->save($path);

        return "/photos/".$filename;
        
    }

    public function edit($id)
    {
        $movie = $this->movie->with('movieCategories')->find($id);

        $movieCategory = $this->movieCategory->all();

        return view('movie.edit', compact('movie','movieCategory'));

    }

    public function update($id, MovieRequest $request)
    {
        $movieForm = $request->except('photo');

        if($request->hasFile('photo')) {
            $movieForm['photo'] = $this->generatePhoto($request->file('photo'), $movieForm);
        }

        $movie = $this->movie->find($id);

        if($movie) {
            $movie->update($movieForm);
        }

        session()->flash('success_message', 'Data terupdate');

        return redirect('/admin');
    }

    public function destroy($id)
    {
        $movie = $this->movie->find($id);

        if($movie) {
            $movie->delete();
        }

        session()->flash('success_message', 'Data terhapus');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $movies = $this->movie->where('title', 'LIKE', "%$keyword%")
            ->orderBy('id', 'ASC')->paginate(10);
        $movies->appends(['keyword' => $keyword]);

        return view('movie.search', compact('movies'));
    }

    //category
    public function indexCategory()
    {
        $movieCategory = $this->movieCategory->orderBy('category')->paginate(10);

        return view('movie.indexCategory', compact('movieCategory'));
    }

    public function createCategory()
    {
        $movieCategory = $this->movieCategory->all();

        return view('movie.createCategory', compact('movieCategory'));
    }

    
}
