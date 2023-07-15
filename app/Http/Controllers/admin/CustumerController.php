<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\FonctionController;
use App\Models\Custumer;
use Illuminate\Http\Request;


class CustumerController extends Controller
{
    // Enregistrer un client
    public function get_custumer_create_form() {
        return view("admin.client.create.create");
    }

    public function custumer_create_save(Request $request) {

        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'locality'=>'required',
            'phone'=>'required',
        ]);

        $new = new FonctionController();
        $response = $new->custumerCreateSave($request->first_name,$request->last_name,$request->phone,$request->locality);
        if($response ==  true){
            return back()->with("create_success","Le client a été ajouté avec succès");
        }
        else{
            return back()->with("create_denied","Erreur : Ce numero est déjà utilisé par un autre client");
        }
    }

    public function custumer_show(){
        $custumers = Custumer::where("delete",'!=',true)->get();
        $compter = count($custumers);
        return view("admin.client.show.show",compact("custumers","compter"));
    }

    public function custumer_delete($custumer_id) {
        if(Custumer::where("id",$custumer_id)->update(["delete"=>true])){
            return back()->with("delete_success","Le client est supprimé avec succès");
        }
        else{
            return back()->with("delete_denied","Erreur : Le client n'a pas été suprimé (connexion) ");
        }
    }

    public function custumer_blocked($custumer_id){
        if(Custumer::where("id",$custumer_id)->update(["access"=>false])){
            return back()->with("blocked_success","Le client est suspendu avec succès");
        }
        else{
            return back()->with("blocked_denied","Erreur : Le client n'a pas été supprimé (connexion)");
        }
    }

    public function custumer_authaurize($custumer_id){
        if(Custumer::where("id",$custumer_id)->update(["access"=>true])){
            return back()->with("authaurize_success","La supension du client a été levé avec succès");
        }
        else{
            return back()->with("authaurize_denied","Echec : Levée de la suspension refusée(connexion)");
        }
    }

    //----------------------api--------------------------//  
    public function ajax_custumer_create_save(Request $request) {
        $new = new FonctionController();
        $response = $new->custumerCreateSave($request->first_name,$request->last_name,$request->phone,$request->locality);
        return $response;
    }

    public function ajax_custumer_update_save(Request $request) {
        $new = new FonctionController();
        $response = $new->custumerUpdateSave($request->custumer_id,$request->first_name,$request->last_name,$request->phone,$request->locality);
        return $response;
    }

    public function ajax_custumer_show($custumer_id){
        $custumer = Custumer::where("id",$custumer_id)->first();
        return $custumer;
    }
}
