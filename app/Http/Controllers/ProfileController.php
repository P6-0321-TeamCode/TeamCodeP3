<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        return view('profile');
    }

    public function store(Request $request){
        $profile = new User();

        $profile->name = $request->name;
        $profile->surname = $request->surname;
        $profile->username = $request->username;
        $profile->email = $request->email;
        $profile->password = $request->password;
        $profile->telephone = $request->telephone;
        $profile->nif = $request->nif;
        $profile->save();

    }

    public function edit(User $user){
        return view ('profile', compact('user'));
    }

    public function update(Request $request, User $user){
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->telephone = $request->telephone;
        $user->nif = $request->nif;
        $user->save();
        return back()->with('Se ha modificado correctamente');
        //dd($request->all());
    }

}
