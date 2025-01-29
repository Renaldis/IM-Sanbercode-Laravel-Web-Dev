<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    public function create(){
        return view("genre.create");
    }

    public function store(Request $request){
        // untuk validasi handle error
        $request->validate([
            'name' => 'required',
        ]);
        // untuk menginsert data
        DB::table('genre')->insert([
            'name' => $request->name,
        ]);
        return redirect("/genre");
    }

    public function index()
    {
        $genre = DB::table("genre")->get();

        return view('genre.index', ['genre' => $genre]);
    }

    public function show($id)
    {
        $genre = DB::table("genre")->where("id", $id)->first();
        return view("genre.detail", ["genre" => $genre]);

    }
    public function edit($id)
    {
        $genre = DB::table("genre")->where("id", $id)->first();
        return view("genre.edit", ["genre" =>$genre]);   
    }

    public function update(Request $request, $id)
    {
        // untuk validasi handle error
        $request->validate([
            'name' => 'required',
        ]);
        // untuk menginsert data
        $genreId = Genre::find($id);

        $genreId->name = $request->name;
        $genreId->save();
        return redirect("/genre");
    }

    public function destroy($id)
    {
        DB::table("genre")->where("id", $id)->delete();
        return redirect("/genre");
    }
}
