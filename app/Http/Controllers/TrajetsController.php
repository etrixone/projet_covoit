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
        $trajet = DB::table('trajets')->where('id', $id)->delete($id);   
        
        return view('admin/all-trajets', ['trajets' => $trajets]);
    }
    
    public function deleteTrajet($id)
    {
        $trajet = DB::table('trajets')->find($id);    
        $trajet->delete();
        
        return redirect('admin/all_trajets');
    } 
    
}
