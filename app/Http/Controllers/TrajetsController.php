<?php

namespace App\Http\Controllers;
use DB;
use View;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrajetsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function getAllTrajets()
    {
        $trajets = DB::table('trajets')->get();
        
        return view('admin/all-trajets', ['trajets' => $trajets]);
    }
    
    public function deleteTrajet($id)
    {
        $idU = DB::table('trajets')->where('id', $id)->value('USR_ID');
        $user = User::findOrFail($idU);
        Mail::to($user)->send(new SupprimerTrajetAdmin);
        
        $trajet = DB::table('trajets')->where('id', $id)->delete($id);
        
        return redirect('admin/all_trajets');
    } 
    
}
