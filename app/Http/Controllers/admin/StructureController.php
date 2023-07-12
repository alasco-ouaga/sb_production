<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Structure;
use App\Models\City;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Telephone;
use Symfony\Component\Console\Input\Input;

class StructureController extends Controller
{
    public function get_structure_data(){
        $structure = Structure::find(1);
        return view("admin.structure.show.show", compact("structure"));
    }

    public function get_structure_update($id) {
        $structure = Structure::find($id);
        $country = Country::find(1);
        $cities = City::where("country_id",$country->id)->get();
        return view("admin.structure.update.update",compact("structure","country","cities")); 
    }

    public function save_structure_update(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'locality'=>'required',
        ]);

        $update = Structure::where("id",$request->structure_id)->update([
            "name" => $request->name,
            "email"=>$request->email,
            "web_link"=>$request->web_link,
            "locality"=>$request->locality,
            "city_id"=>$request->city_id
        ]);

        if ($update){
            return redirect()->route('get_structure_data');
        }
        else{
            return back()->with("denied","Echec de modification : erreur inconne : Relancher une nouvelle fois")->withInput();
        }
    }

    public function get_structure_phone() {
        $phones = Telephone::all();
        $compter = count($phones);
        return view("admin.structure.phone.show",compact("phones","compter"));
    }

    public function confirm_delete_structure($id) {
        $count = count(Telephone::all());
        if($count <= 1){
            return back()->with("delete_refused","Echec de supression: au moins un numero est obligatoire");
        }
        else{
            $delete = Telephone::find($id)->delete();
            if($delete){
                return back()->with("delete_success","La supression a reussie avec succès");
            }
            else{
                return back()->with("server_error","Echec de suppression : restaurer votre connextion puis essayer à nouveau");
            }
        }
    }

    public function phone_create(Request $request){

        $compter = count(Telephone::all());
        $telephone = Telephone::where("phone",$request->number)->exists();
        if ($compter == 3 || Telephone::where("phone",$request->number)->exists()) {
            return false;
        } 
        else {
            $user = auth()->user();
            $telephone = [
                [
                    'phone' => $request->number,
                    'structure_id' => $user->id,
                ]
            ];
            
            $create = Telephone::insert($telephone);
            if ($create) {
                return true;
            }
        }
    }

    public function save_phone_update(Request $request){
        //Verifier si numero existe tjr pour la modification
        if(Telephone::where("id",$request->phone_id)->exists()){
            //verifier pour savoir si le numero esxiste deja 
            if( ! Telephone::where("phone",$request->phone_number)->exists()){
                Telephone::where('id', $request->phone_id)->update([
                    'phone' => $request->phone_number,
                ]);
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    //Avoir tous les roles
    public function get_role(){
        $roles = Role::all();
        return view("admin.structure.role.show",compact("roles"));
    }

    //recuperation des permissions par d'un role
    public function get_role_permission($role_id){
        $role = Role::with("permissions")->where("id",$role_id)->first();
        $compter = count($role->permissions);
        $role_name=$role->name;
        return view("admin.structure.permission.show",compact("role","role_name","compter")); 
    }
    
}
