<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class CastController extends Controller
{
    public function create()
    {
        return view('cast.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'bio' => 'required',
        ]);

        DB::table('cast')->insert([
            'name' => $request['name'],
            'age' =>  $request['age'],
            'bio' =>  $request['bio'],
        ]);
        return redirect("/cast");
    }

    public function index()
    {
        $cast = DB::table("cast")->get();

        return view("cast.tampil", ["cast" => $cast]);
    }

    public function show($id)
    {
        $castId = DB::table("cast")->where("id", $id)->first();

        return view("cast.show", ["cast" => $castId]);
    }

    public function edit($id)
    {
        $castEdit = DB::table("cast")->where("id", $id)->first();

        return view("cast.edit", ["cast"=> $castEdit]);
    }
    public function update(Request $request,$id)
    {
        DB::table('cast')
        ->where('id', $id)
        ->update(
            [
            'name' => $request['name'],
            'age' => $request['age'],
            'bio' => $request['bio'],
            ]);
            return redirect("/cast");
    }

    public function destroy($id)
    {
        DB::table('cast')->where('id', $id)->delete();
        return redirect("/cast");
    }
}
