<?php

namespace App\Http\Controllers;
use DB;
use View;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        
        //On recupere l'id de l'utilisateur connecté
        $id=Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        
        //On recupere la valeur du champ "enable" dans la base.
        $enable=User::where('id',$id)->select('enable')->first();
  
        //Cast puis verification du champs.
       if (intval($enable->enable)==1) {
             return redirect('/home');
            
        } else {
            return "Désolé votre compte est desactivé contactez l'administrateur.";
        }


        
    }
    
        public function home()
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
