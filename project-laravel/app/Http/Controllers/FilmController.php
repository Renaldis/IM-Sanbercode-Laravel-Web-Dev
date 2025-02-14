<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(["index","show"]);
    }

    public function index()
    {
        $film = Film::get();
        $genre = Genre::all();
        return view("film.index", ["film" => $film, 'genre' => $genre]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();
        return view("film.create", ["genre"=>$genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "summary"=> "required", 
            "year" => "required", 
            "poster" => "required|image|mimes:png,jpg,jpeg", 
            "genre_id" => "required|exists:genre,id"
        ]);

        //  mengambil data file
        $fileName = time().".".$request->poster->extension();
        $request->poster->move(public_path('images'), $fileName);

        // untuk menginsert data menggunakan orm
        $film = new Film();
        $film->title = $request->title;
        $film->summary = $request->summary;
        $film->year = $request->year;
        $film->poster = $fileName;
        $film->genre_id = $request->genre_id;
        $film->save();

        return redirect("/film");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::find($id);
        return view("film.detail", ["film"=>$film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        $genre = Genre::all();
        return view("film.update", ["film"=>$film, "genre"=>$genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // untuk validasi handle error
        $request->validate([
            "title" => "required",
            "summary"=> "required", 
            "year" => "required", 
            "poster" => "nullable|image|mimes:png,jpg,jpeg", 
            "genre_id" => "required|exists:genre,id"
        ]);

        $film = Film::find($id);

        if($request->has("poster")){
            $path = public_path('images/');
            File::delete($path. $film->poster);

            //  mengambil data file
            $fileName = time().'.'.$request->poster->extension();
            $request->poster->move(public_path('images'), $fileName);
            $film->poster = $fileName;
            $film->save();
        };

        $film->title = $request->title;
        $film->summary = $request->summary;
        $film->year = $request->year;
        $film->genre_id = $request->genre_id;
        $film->save();

        return redirect("/film");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);

        $path = public_path("images/");
        File::delete($path . $film->poster);

        $film->delete();
        return redirect("/film");
    }
}
