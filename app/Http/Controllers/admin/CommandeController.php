<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\admin\FonctionController;
use App\Models\Commande;
use App\Models\Custumer;
use App\Models\Produit;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //Debut pour enregistrement de commande
    public function commande_create_form(){
        $custumers = Custumer::all();
        $produits = Produit::all();
        return view("admin.commande.create.create",compact("custumers","produits"));
    }

    //Enregistrer une commande
    public function commande_create_save(Request $request){

        $request->validate([
            'quantity'=>'required',
        ]);

        $new = new FonctionController();
        $create = $new->commandeCreateSave($request->custumer_id,$request->produit_id,$request->quantity,$request->susplus,$request->note);
        if($create){
            return back()->with("create_success","Succès : La commande a été enregistré avec succès.");
        }
        else{
            return back()->with("create_denied","Erreur : commande non enregistré (erreur de connexion)");
        }
    }

    //recuperation des commmande payer

    public function commande_payment_completed() {
        $new = new FonctionController();
        $commande = $new->commandePayementCompleted();
        $compteur = count($commande);
        return view("admin.commande.payment.show.payed",compact("commandes",$compteur));
    }

    public function commande_unpaid() {
        $new = new FonctionController();
        $commandes = $new->commandePayementUncompleted();
        $compter = count($commandes);
        return view("admin.commande.show.unpaid",compact("commandes","compter"));
    }

    public function commande_delete($commande_id){
        $commande = Commande::find($commande_id);
        return view("admin.commande.show.invoice",compact("commande"));
    }

    public function commande_show($commande_id){
        $commande = Commande::find($commande_id);
        return view("admin.commande.show.invoice",compact("commande"));
    }

    public function commande_update($commande_id){
        $commande = Commande::find($commande_id);
        $custumers = Custumer::all();
        $produits = Produit::all();
        return view("admin.commande.update.update",compact("commande","custumers","produits"));
    }

    public function commande_update_save(Request $request) {
        $request->validate([
            'quantity'=>'required',
        ]);
        $new =  new FonctionController();
        $save = $new->commandeUpdateSave($request->commande_id,$request->custumer_id,$request->quantity,$request->excess,$request->note);
        if($save){
            return back()->with("update_success","Modification reussie avec succès");
        }
        else{
            return back()->with("update_denied","Echec de modification.Actualiser");
        }
    }

    //voir les details sur une commande
    public function ajax_commande_view($commande_id){
        
    }

    //Creer une commande avec ajax
    public function ajax_commande_create(Request $resquest){
        
    }

    //Modifier une commande avec ajax
    public function ajax_commande_update_form(){
        
    }

    //Enregistrer la modification d'une commande
    public function ajax_commande_update_save (Request $resquest){
        
    }
}
