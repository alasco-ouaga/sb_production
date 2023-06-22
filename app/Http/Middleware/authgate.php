<?php

namespace App\Http\Middleware;

use App\Models\RoleUser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class authgate
{
    
    public function handle(Request $request, Closure $next): Response
    {
        /* L'objectif est de recuperer toutes les permissions et d'en former des blocus pour les acces.
        On va donc rechercher le user qui s'est connecter , ensuite recupere ses permissions et 
        passser a la creation du Gate qui prendra le nom de la permission */

        //rechercher l'utilisateur qui s'est connecter
        $user = auth()->user();

        if (!$user) {
            // Si aucun utilisateur n'est trouvé, retourner la réponse actuelle
            // sans effectuer d'autres traitements.
            return $next($request);
        }
        

        //fabriquer des gates avec les noms de ces permissions en fonction des roles du users qui s'est connecter
        foreach ($user->roles as $role) {
            /* Dans la modelisation chaque user peut avoir plusieur roles.Cependant parmis 
            ces differerent roles , ils a un role principale qui est indexé par index == true  */

            //Recuperation du role qui a ete indexé en parcourir toutes ces permissions
            $index = RoleUser::where('user_id', $user->id)
                            ->where("role_id", $role->id)
                            ->where("index", true)->first();

            if ($index == true) {
                /*  parcourir toutes les permissions de ce role indexé ensuite 
                 recuperer chaque nom de la pemission et faire un gate */
                foreach ($role->permissions as $permission) {
                    Gate::define($permission->name, function () {
                        return true;
                    });
                }
                break;
            }
        }

        return $next($request);
    }
}
