<?php

namespace App\Http\Controllers;

use DB;
use View;
use App\User;
use App\Ville;
use App\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DateTime;

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
        
        $trajets = Trajet::where('TRJ_DEPART', $request->input('depart'))
                ->where('TRJ_DESTINATION', $request->input('destination'))->get();

        $trajetsEtapesDepart = Trajet::where('TRJ_DEPART', $request->input('depart'))
                ->where('TRJ_ETAPE1', $request->input('destination'))->get();
        
        $trajetsEtapesDestination = Trajet::where('TRJ_ETAPE1', $request->input('depart'))
                ->where('TRJ_DESTINATION', $request->input('destination'))->get();

        // $destination=Trajet::join('villes', 'villes.id', '=', 'trajets.vil_id_destination')->where('villes.vil_nom',$request->input('depart'))->get();
       //$resultat=Trajet::get();
        
        return View::make('trajet')
                ->with('trajets',$trajets)
                ->with('trajetsEtapesDepart', $trajetsEtapesDepart)
                ->with('trajetsEtapesDestination', $trajetsEtapesDestination);
    }
    public function trajet() {
        return view('ajouter-trajet');
    }

    public function ajoutTrajet(Request $request) {
        $this->validate($request, ['date' => 'date_format:"d/m/Y', 'heureDepart' => 'date_format:"H:i"', 'heureDestination' => 'date_format:"H:i"', 'depart' => 'required', 'destination' => 'required', 'places' => 'required|integer|between:1,7', 'prix' => 'required|integer|between:1,500']);

       // $depart = $this->ajoutVille($request->depart, $request->departement, $request->longitude, $request->latitude);
       // $destination = $this->ajoutVille($request->destination, $request->destination_departement, $request->destination_longitude, $request->destination_latitude);

        
        $trajet = new Trajet;
        $datetime = new DateTime();
        $dateDepart = $datetime->createFromFormat('d/m/Y', '$request->date');
        $trajet->TRJ_DATE_DEPART = Carbon::parse($dateDepart)->format('Y-m-d');
        $trajet->TRJ_HEURE_DEPART = Carbon::parse($request->heureDepart)->format('H:i:00');
        $trajet->TRJ_HEURE_DESTINATION = Carbon::parse($request->heureDestination)->format('H:i:00');
        $trajet->TRJ_DEPART =  $request->localityDepart;
        $trajet->TRJ_DESTINATION = $request->localityDestination;
        $trajet->TRJ_INFO = $request->informations;
        $trajet->TRJ_PRIX = $request->prix;
        $trajet->TRJ_FLEXIBLE = $request->flexible;
        $trajet->TRJ_PLACES = $request->places;
        $trajet->TRJ_ETAPE1 = $request->localityEtape1;
        $trajet->TRJ_ETAPE2 = $request->etape2;
        $trajet->TRJ_ETAPE3 = $request->etape3;
                $trajet->USR_ID = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $trajet->save();

         return "trajet enregistré";
    
    }
}
