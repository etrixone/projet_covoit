<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\User;
class Enable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request);
        //On recupere l'id de l'utilisateur connecté
        $id=Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        
        //On recupere la valeur du champ "enable" dans la base.
        $enable=User::where('id',$id)->select('enable')->first();
        
        //Cast puis verification du champs.
       if (intval($enable->enable)==1) {
        return $next($request);
       }
       else {
           return response('Votre compte est desactivé !',401);
       }
    }
}
