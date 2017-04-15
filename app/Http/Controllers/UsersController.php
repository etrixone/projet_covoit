<?php

namespace App\Http\Controllers;
use DB;
use View;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function csvForm()
    {   
        $classes = DB::table('classes')->get();
        
        return view('admin/upload')->with(['classes' => $classes]);
    }
    
    public function allUsersForm()
    {
        $users = DB::table('users')->get();
        $classes = DB::table('classes')->get();
        
        return view('admin/all-users')->with(['users' => $users])->with(['classes' => $classes]);
    }
 
    public function getUsers(Request $request)
    {
        $classe = $request->input('cla');
        $users = DB::table('users')->where('admin','false')->where('classe', $classe)->get();
        $classes = DB::table('classes')->get();
        
        return view('admin/all-users')->with(['users' => $users])->with(['classes' => $classes]);
    }
    
    public function allUsersRecent()
    {
        $users = DB::table('users')->where('admin','false')->orderBy('last_connection', 'desc')->get();
        $classes = DB::table('classes')->get();
        
        return view('admin/all-users')->with(['users' => $users])->with(['classes' => $classes]);
    }
    
    public function supprimerClasse(Request $request)
    {
        $classe = $request->input('supprimerClasse');
        DB::table('classes')->where('CLS_NOM', $classe)->delete(); 
        
        return redirect('admin/csv_upload');
    } 
    
    public function deleteUser($id)
    {
        $user = User::find($id);    
        $user->delete();
        
        return redirect('admin/all_users');
    } 
    
    public function ajouterClasse(Request $request)
    {
        $classe = $request->input('texte_classe');
        if(!$classe){
            return view('admin.erreur_ajoutClasse');
        }
        DB::table('classes')->insert(['CLS_NOM' => $classe]);
        
        return redirect('admin/csv_upload');
    } 
    
    public function deleteAllUsers(){
        foreach (User::where('admin','false')->get() as $user){
           $user->delete();
        }       
        
        return redirect('admin/all_users');
    }  
    
    public function statusUser($id)
    {
        $user = User::find($id);
        $status=$user->enable;
        
        if($status===true)
        {
            $user->enable = $status = !$status;
            $user->save();
        }
        else
        {
            $user->enable = $status = !$status;
            $user->save();
        }
        
        return redirect('admin/all_users');
    }  
    
    public function statusAllUsers()
    {
        foreach (User::where('admin','false')->get() as $user){
           $status=$user->enable;
        
            if($status===true)
            {
                $user->enable = $status = !$status;
                $user->save();
            }
            else
            {
                $user->enable = $status = !$status;
                $user->save();
            } 
        }       
        
        return redirect('admin/all_users');
    }  
    
     public function usersList(Request $request)
    {   
         
        $mime =$request->file('upload_file');
        if(!$mime){
            return view('admin.erreur_csv');
        }
        
        try{
            $mime = $request->file('upload_file')->getMimeType();
            $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');

            if(in_array($mime,$mimes))
            {
                $upload=$request->file('upload_file');
                $filePath=$upload->getRealPath();
                $file=fopen($filePath, 'r');

                $array = array();
                $index = 0;

                $f = fopen($filePath, 'r');

                while($lg = fgetcsv($f,1000,';')) 
                {
                    if($lg && array($lg))
                    {
                        $array[$index] = $lg;     

                        $nom = $array[$index][0];
                        $prenom = $array[$index][1];
                        $email = $array[$index][2];
                        $classe = $array[$index][3];

                        $user= new User;
                        $user->name=$nom;
                        $user->surname=$prenom;
                        $user->email=$email;
                        $user->enable=0;
                        $user->admin=0;
                        $user->classe=$classe;
                        $user->save();
                    }
                    $index = $index + 1;
                }
                fclose($f);

                return redirect('admin/all_users');
            }        
        }
        catch(\Exception $e) {
            return view('admin.erreur_csv');
        }
    }
}
