<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(Auth::user()->rol_id);
        $rolIdUser=Auth::user()->rol_id;
        if($rolIdUser===1){//es admin
            return redirect()->route('admin');
        }else if($rolIdUser===2){//es profesor
            return redirect()->route('teacher');
        }else if ($rolIdUser===3){//es estudiante
            return redirect()->route('student','$course');
        }
    }
}
