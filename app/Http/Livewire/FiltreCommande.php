<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Commande;

class FiltreCommande extends Component
{
    public $filtreParEtat;
    public string $filtreParCode = '';
    public $commandes = [];

    public function render()
    {
        if($this->filtreParCode != ''){
            $commande = Commande::where("delete",false)->get();
            $commandes = $commande->filter(function ($commande) {
                return stripos($commande->code, $this->filtreParCode) !== false;
            });
            return  view('livewire.filtre-commande',[
                'commandes' => $commandes
            ]);
        }
        else{
            return  view('livewire.filtre-commande',[
                $this->commandes = Commande::all()
            ]);
        }


    }
}
