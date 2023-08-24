<?php

namespace App\Models;
use App\Models\magasin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;


class Article extends Model
{
    use HasFactory ;
    // $guarded=[''] il ya pas des champ a proteger
     protected $guarded=[''];
    // public function toSearchableArray(){
    //     //  a l'interieur de cette methode on doit définir les colonnes qui seront utiliser pour la/les recherches
    //     $SearchArray=[
    //         'id' => (int) $this->id,
    //         // ->titre si le titre qui est dans le model meme chose pour ->description
    //         'titre'=>$this->titre,
    //         'description'=>$this->description,
    //     ];
    //     return $SearchArray;
    // }
    public function magasins(){
        return $this->belongsToMany(magasin::class)->withPivot('quantite');
        
    }
}
