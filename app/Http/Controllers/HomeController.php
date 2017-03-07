<?php

namespace App\Http\Controllers;

use DB;
use View;
use App\User;
use App\Ville;
use App\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return redirect('/home');
    }
    
    public function admin() {
        return view('admin.index');
    }

    public function home() {
        return view('home');
    }

    public function recherche(Request $request) {

        $this->validate($request, ['depart' => 'required', 'destination' => 'required']);
        $trajets = Trajet::where('TRJ_DEPART',$request->input('depart'))->get();
        
       // $destination=Trajet::join('villes', 'villes.id', '=', 'trajets.vil_id_destination')->where('villes.vil_nom',$request->input('depart'))->get();
       //$resultat=Trajet::get();

        return View::make('trajet')->with('resultat', $trajets);
    }
    public function trajet() {
        return view('ajouter-trajet');
    }

    public function ajoutTrajet(Request $request) {
        $this->validate($request, ['depart' => 'required', 'destination' => 'required']);

       // $depart = $this->ajoutVille($request->depart, $request->departement, $request->longitude, $request->latitude);
       // $destination = $this->ajoutVille($request->destination, $request->destination_departement, $request->destination_longitude, $request->destination_latitude);

        
        $trajet = new Trajet;
        $trajet->TRJ_DEPART = $$request->depart;
        $trajet->TRJ_DESTINATION = $$request->destination;
        $trajet->TRJ_INFO = $request->info;
        $trajet->USR_ID = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $trajet->save();

         return "trajet enregistré";
    
    }
}
