<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use App\Http\Requests\ValidateFormRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //si on applique un route on executer une methode de controller 
    // Controller permet de ecrire une logique lor d un route est applique
    public function methode1($userName){
        return 'ceci est la methode 1, bonjour ,'.$userName;
    }
    public function exemple(){
        return 'Cec est un exemple';
    }
  
    public function accueil(){
        $userName='yousraa';
        $numero=['1','2','3','4'];
        return  view('accueil',[
            'userName'=>$userName,
            'age'=>16,
            'produit'=>'',
            'nums'=>$numero
        ]);

    }
    public function article(){
        
        return  view('article');

    }
    public function store(ValidateFormRequest $request){

        // echo'ok';
        // dd()permet d afficher le contenu d 'une variable
        // dd($request);
       $verif= $request;
        if($verif){
            echo"verification passe";
        }else{
            return redirect()->back();

        }
        

    }
}
