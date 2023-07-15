<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\FonctionController;
use Illuminate\Http\Request;


class CustumerController extends Controller
{
    // Enregistrer un client
    public function get_custumer_create_form() {
        return view("admin.custumer.create.create");
    }

    public function custumer_create_save(Request $request) {
        $new = new FonctionController();
        $response = $new->custumerCreateSave($request->first_name,$request->last_name,$request->phone,$request->locality);
        if($response ==  true){
            return back()->with("create_success","Le client a été ajouté avec succès");
        }
        else{
            return back()->with("create_denied","Erreur : Le client n'a été ajouté.Essayer une nouvelle fois");
        }
    }

    public function custumer_update_save(Request $request) {
        $new = new FonctionController();
        $response = $new->custumerUpdateSave($request->custumer_id,$request->first_name,$request->last_name,$request->phone,$request->locality);
        return $response;
    }
}
