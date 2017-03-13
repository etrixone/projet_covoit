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
        return view('admin/upload');
    }
    
    public function allUsersForm()
    {
        $users = DB::table('users')->where('admin','false')->get();
        $letters = range('A', 'Z');

        return view('admin/all-users', ['users' => $users], ['letters' => $letters]);
    }
    
    public function getUsers($letter)
    {
        $users = DB::table('users')->where('admin','false')->where('name', 'like', $letter.'%')->get();
        $letters = range('A', 'Z');
        
        return view('admin/all-users', ['users' => $users], ['letters' => $letters]);
    }
    
    public function deleteUser($id)
    {
        $user = User::find($id);    
        $user->delete();
        
        return redirect('admin/all_users');
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
    
    /*
    public function password()
    {
        $password = "";

        $string = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789";
        $string_length = strlen($string);

        for($i = 1; $i <= 6; $i++)
        {
            $rand = mt_rand(0,($string_length-1));
            $password .= $string[$rand];
        }

        return $password;   
    }
    */
    
     public function usersList(Request $request)
    {   
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
                    //$pwd=self::password();

                    $user= new User;
                    $user->name=$nom;
                    $user->surname=$prenom;
                    $user->email=$email;
                    //$user->password=hash('sha256', $pwd);
                    $user->save();
                }
                $index = $index + 1;
            }
            fclose($f);
            
            return redirect('admin/all_users');
        }
        else{
            return redirect('admin/csv_upload');
        }
         
        
    }
}
