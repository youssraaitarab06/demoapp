<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    public function index(){
        return view('search.search');
    }
    public function recherche(Request $request){
        if ( $request-> ajax ( ) )
{
    $sortie= "" ;
  $products=DB:: table ( 'products' ) -> where ( 'title' , 'LIKE' , '%' .$request->search. "%" ) -> get ( ) ;
if ('$produits')
{
foreach ( $products as $key => $product ) {  
$sortie.= '<tr>' .
'<td>' .$product->id. '</td>' .
// '<td>' .$produit->titre. '</td>' .
// '<td>' .$product->description. '</td>' .
// '<td>' .$produit->prix. '</td>' .
'</tr>' ;
}
   return ( $sortie ) ;
   }
   }
       
        
    }
}
