<?php

namespace App\Http\Controllers;
use DB;
use View;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    

    public function recherche(Request $request)
    {
        $recherche = DB::table('trajets')->where('depart','=',$request->input('depart'))->get();
        /*foreach ($recherche as $trajet){
            echo 'Trajet : ', $trajet->depart, '->' ,$trajet->destination, '<br/>';
           
        }*/
        
        return View::make('trajet')->with('depart', $recherche);
    }
    }
