<?php

namespace App\Http\Controllers;
use DB;
use View;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SuppressionTrajetConducteurAdmin;
use App\Mail\SuppressionTrajetCovoitureurAdmin;

class TrajetsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function getAllTrajets()
    {
        $trajets = DB::table('trajets')->join('users', 'trajets.usr_id', '=', 'users.id')->get();
        
        return view('admin/all-trajets', ['trajets' => $trajets]);
    }
    
    public function deleteTrajet($id)
    {
        $idU = DB::table('trajets')->where('id', $id)->value('USR_ID');
        $user = User::findOrFail($idU);
        Mail::to($user)->send(new SuppressionTrajetConducteurAdmin);
        
        $idC = DB::table('trajets_users')->where('ID', $id)->value('USR_ID');
        if(!$idC){
            foreach($idC as $idC){
            $user = User::findOrFail($idC);
            Mail::to($user)->send(new SuppressionTrajetCovoitureurAdmin);
            }
        }
        
        
        $trajet = DB::table('trajets')->where('id', $id)->delete($id);
        
        return redirect('admin/all_trajets');
    } 
    
}
