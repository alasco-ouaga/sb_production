<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class gestionnaireRouteProtected
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       //rechercher l'utilisateur qui s'est connecter
        $user = auth()->user();

        //tantque qu'on ne trouve pas l'utilisateur connecter, on continu de le chercher
        if (!$user) {
            return $next($request);
        }

        $index = false;
        foreach($user->roles as $role){
            if($role->name == 'administrateur'  || $role->name == 'gestionnaire'){
                $index = true;
                break;
            }
        }

        if($index){
            return $next($request);
        }

        if( !$index){
            abort(403);
        } 
    }
}
