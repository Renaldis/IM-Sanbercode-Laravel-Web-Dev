<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('page.register');
    }
    public function send(Request $request){
        $namaDepan =$request->input('firstName');
        $namaBelakang =$request->input('lastName');
        $jenisKelamin = $request->input('gender');
        $kenegaraan = $request->input('nationality');
        $bio = $request->input('bio');
        $languages = $request->input('language', []);

        return view('page.welcome', [
            "namaDepan" => $namaDepan,
            "namaBelakang" => $namaBelakang,
            "jenisKelamin" => $jenisKelamin,
            "kenegaraan" => $kenegaraan,
            "bio" => $bio,
            "languages" => $languages
        ]);
    }
}
