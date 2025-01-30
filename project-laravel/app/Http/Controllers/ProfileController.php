<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $idUser = Auth::id();
        $detailProfile = Profile::where("user_id", $idUser)->first();
        return view("profile.index", ["detailProfile" => $detailProfile]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'bio'=>"required",
            'age'=>"required",
            'address'=>"required",
        ]);
        $profile = Profile::find($id);

        $profile->age = $request->age;
        $profile->bio = $request->bio;
        $profile->address = $request->address;
        $profile->save();

        return redirect("/profile");
    }
}
