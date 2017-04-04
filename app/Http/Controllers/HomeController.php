<?php

namespace App\Http\Controllers;

use DB;
use View;
use App\User;
use App\Voiture;
use App\Trajet;
use App\Reservation;
use App\Mail\AjoutTrajet;
use App\Mail\SuppressionTrajetConducteur;
use App\Mail\SuppressionTrajetCovoitureur;
use App\Mail\ReservationCovoitureur;
use App\Mail\ReservationConducteur;
use App\Mail\AnnulationReservationConducteur;
use App\Mail\AnnulationReservationCovoitureur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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
        return redirect('/rechercher_un_trajet');
    }

    public function rechercherUnTrajet() {
        return view('rechercher-un-trajet');
    }

    public function resultatRecherche(Request $request) {

        if ($request->date != null ){
            $this->validate($request, ['depart' => 'required', 'destination' => 'required', 'date' => 'required|date_format:d/m/Y|after:today']);
            $dat = DateTime::createFromFormat('d/m/Y', $request->date);
            $date = $dat->format('Y-m-d');
            $trajets = Trajet::where('TRJ_DEPART', $request->input('depart'))
                            ->where('TRJ_DESTINATION', $request->input('destination'))
                            ->where('TRJ_PLACES', '>', 0)
                            ->where('TRJ_DATE_DEPART', '=', $date)->get();

            $trajetsEtapesDepart = DB::select('select * from trajets where TRJ_PLACES > 0 and TRJ_DATE_DEPART ="' . $date . '" and TRJ_DEPART ="' . $request->input('depart') . '" and TRJ_ETAPE1 ="' . $request->input('destination') . '" or TRJ_ETAPE2 ="' . $request->input('destination') . '";');
            $trajetsEtapesDestination = DB::select('select * from trajets where TRJ_PLACES > 0 and TRJ_DATE_DEPART ="' . $date . '" and TRJ_DESTINATION ="' . $request->input('destination') . '" and TRJ_ETAPE1 ="' . $request->input('depart') . '" or TRJ_ETAPE2 ="' . $request->input('depart') . '";');
        }
        else {
             $this->validate($request, ['depart' => 'required', 'destination' => 'required']);

            $trajets = Trajet::where('TRJ_DEPART', $request->input('depart'))
                            ->where('TRJ_DESTINATION', $request->input('destination'))
                            ->where('TRJ_PLACES', '>', 0)->get();
             $trajetsEtapesDepart = DB::select('select * from trajets where TRJ_PLACES > 0  and TRJ_DEPART ="' . $request->input('depart') . '" and TRJ_ETAPE1 ="' . $request->input('destination') . '" or TRJ_ETAPE2 ="' . $request->input('destination') . '";');
            $trajetsEtapesDestination = DB::select('select * from trajets where TRJ_PLACES > 0 and TRJ_DESTINATION ="' . $request->input('destination') . '" and TRJ_ETAPE1 ="' . $request->input('depart') . '" or TRJ_ETAPE2 ="' . $request->input('depart') . '";');
        }

        return View::make('resultat-recherche')
                        ->with('trajets', $trajets)
                        ->with('trajetsEtapesDepart', $trajetsEtapesDepart)
                        ->with('trajetsEtapesDestination', $trajetsEtapesDestination);
    }

    public function detailsTrajet($id) {

        $trajet = Trajet::where('id', $id)->first();


        $depart = strtotime(Carbon::parse($trajet->TRJ_HEURE_DEPART)->format('H:i'));
        $destination = strtotime(Carbon::parse($trajet->TRJ_HEURE_DESTINATION)->format('H:i'));
        $duree = gmdate('H:i', $destination - $depart);

        $voiture = Voiture::where('USR_ID', $trajet->USR_ID)->first();
        $user = User::where('ID', $trajet->USR_ID)->first();


        return View::make('details-trajet')
                        ->with('trajet', $trajet)
                        ->with('duree', $duree)
                        ->with('voiture', $voiture)
                        ->with('user', $user);
    }

    public function detailsTrajetReservation($id) {

        $trajet = Trajet::where('id', $id)->first();

        $depart = strtotime(Carbon::parse($trajet->TRJ_HEURE_DEPART)->format('H:i'));
        $destination = strtotime(Carbon::parse($trajet->TRJ_HEURE_DESTINATION)->format('H:i'));
        $duree = gmdate('H:i', $destination - $depart);

        $voiture = Voiture::where('USR_ID', $trajet->USR_ID)->first();
        $user = User::where('ID', $trajet->USR_ID)->first();


        return View::make('details-trajet-reservation')
                        ->with('trajet', $trajet)
                        ->with('duree', $duree)
                        ->with('voiture', $voiture)
                        ->with('user', $user);
    }

    public function detailsTrajetProposer($id) {

        $trajet = Trajet::where('id', $id)->first();

        $depart = strtotime(Carbon::parse($trajet->TRJ_HEURE_DEPART)->format('H:i'));
        $destination = strtotime(Carbon::parse($trajet->TRJ_HEURE_DESTINATION)->format('H:i'));
        $duree = gmdate('H:i', $destination - $depart);

        $voiture = Voiture::where('USR_ID', $trajet->USR_ID)->first();
        $user = User::where('ID', $trajet->USR_ID)->first();


        $covoit = User::where('TRJ_ID', $id)
                        ->join('trajets_users', 'users.id', '=', 'trajets_users.USR_ID')->get();

        //dd($covoit[0]->name);
//here `TRJ_ID` = ".$id.");
        
        return View::make('details-trajet-proposer')
                        ->with('trajet', $trajet)
                        ->with('duree', $duree)
                        ->with('voiture', $voiture)
                        ->with('user', $user)
                        ->with('covoit', $covoit);
    }

    public function reserverTrajet(Request $request) {
        
        $user = User::find(Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'));
        $trajet = Trajet::find($request->id);
        $places = $trajet->TRJ_PLACES;
        $conducteur = User::find($trajet->USR_ID);

        
        if ($user->id != $trajet->USR_ID and (sizeof($user->reserver()->where('TRJ_ID',$trajet->id)->get()) == 0)){
            if ($places > 0) {
                $places = $trajet->TRJ_PLACES - 1;
                $user->reserver()->attach([$request->id]);
                DB::select("update `trajets` set `TRJ_PLACES` = " . $places . " where `id` =" . $request->id . ";");
                Mail::to($user)->send (new ReservationCovoitureur);
                Mail::to($conducteur)->send (new ReservationConducteur);
                return View::make('message')
                                ->with('message', "Reservation effectuée !");
            } else {
                return View::make('message')
                                ->with('message', "Désolé il n'y a plus de place pour ce trajet !");
            }
        }
        else {
             return View::make('message')
                                ->with('message', "Vous ne pouvez pas reserver votre propre trajet ou bien reserver plusieurs fois le même trajet !");
        }
    }

    public function annulerReservation(Request $request) {
        $user = User::find(Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'));
        $annulation = $user->reserver()->detach([$request->id]);
        
        if ($annulation == 1){
            $trajet = Trajet::find($request->id);   
            $places = $trajet->TRJ_PLACES + 1;
            $conducteur = User::find($trajet->USR_ID);
            DB::select("update `trajets` set `TRJ_PLACES` = " . $places . " where `id` =" . $request->id . ";");
            Mail::to($user)->send (new AnnulationReservationCovoitureur);
            Mail::to($conducteur)->send (new AnnulationReservationConducteur);
            return View::make('message')
                            ->with('message', "Reservation Annulée!");
        }
        else {
             return View::make('message')
                            ->with('message', "Vous n'avez pas reservé ce trajet, donc vous ne pouvez pas l'annuler");
        }
        
    }

    public function mesReservations() {
        $user = User::find(Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'));
        $reservations = $user->reserver()->get();
        return view('mes-reservations')
                        ->with('reservations', $reservations);
    }

    public function mesTrajets() {
        $user = User::find(Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d'));

        $trajets = $user->proposer()->get();



        return view('mes-trajets')
                        ->with('trajets', $trajets);
    }

    public function proposerUnTrajet() {
        return view('proposer-un-trajet');
    }

    public function validerProposerUnTrajet(Request $request) {
        $this->validate($request, ['date' => 'required|date_format:"d/m/Y"|after:today', 'heureDepart' => 'required|date_format:"H:i"', 'heureDestination' => 'required|date_format:"H:i"', 'depart' => 'required', 'destination' => 'required', 'places' => 'required|integer|between:1,7', 'prix' => 'required|integer|between:0,500', 'bagage' => 'required']);
        $trajet = new Trajet;
        $datetime = new DateTime();
        $dateDepart = $datetime->createFromFormat('d/m/Y', $request->date);
        $trajet->TRJ_DATE_DEPART = $dateDepart->format('Y-m-d');
        $trajet->TRJ_HEURE_DEPART = Carbon::parse($request->heureDepart)->format('H:i:00');
        $trajet->TRJ_HEURE_DESTINATION = Carbon::parse($request->heureDestination)->format('H:i:00');
        $trajet->TRJ_DEPART = $request->localityDepart;
        $trajet->TRJ_DESTINATION = $request->localityDestination;
        $trajet->TRJ_INFO = $request->informations;
        $trajet->TRJ_PRIX = $request->prix;
        $trajet->TRJ_FLEXIBLE = $request->flexible;
        $trajet->TRJ_PLACES = $request->places;
        $trajet->TRJ_ETAPE1 = $request->localityEtape1;
        $trajet->TRJ_ETAPE2 = $request->localityEtape2;
        $trajet->TRJ_BAGAGE = $request->bagage;
        $trajet->USR_ID = Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $trajet->save();
        $user = Auth::user();
        Mail::to($user)->send (new AjoutTrajet);
        return View::make('message')
                        ->with('message', 'Votre trajet à bien était ajouté. Il est disponible dans la rubrique "Mes trajets".' );
    }

    public function annulerTrajet(Request $request) {
        
        
        $trajet = Trajet::where('id', $request->id )->first();
        $covoitureurs = Trajet::find($request->id)->reserver()->get();
        $user = Auth::user();
        
        if($user->id == $trajet->USR_ID){
            Mail::to($user)->send (new SuppressionTrajetConducteur);
            if (sizeof($covoitureurs) >= 1){
                Mail::to($covoitureurs)->send (new SuppressionTrajetCovoitureur($trajet));
            }
            DB::delete("delete from trajets where id=". $request->id .";");
            return View::make('message')
                        ->with('message', "Trajet Annulé!");
        }
        else {
            return View::make('message')
                            ->with('message', "Vous ne pouvez pas supprimer ce trajet");
        }
        
           
    }

    public function profil(Request $request) {
        return view('profil');
    }

    public function modifierProfil(Request $request) {
        return view('modifier-profil');
    }

    public function admin() {
        return view('admin.index');
    }

}
