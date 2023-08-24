<?php

namespace App\Http\Controllers\ArticleControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleMagasin;
use App\Models\Magasin;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use PDF;



class ArticleController extends Controller
{
    public function index(){
        // $articles=Article::All();
        $articles=Article::paginate(5);
        return  view('article',['articles'=> $articles]);

    }
    public function store(Article $article ,ArticleRequest $request){
       

        $article::create([
            'titre'=>$request->titre,
            'description'=>$request->description,
            'dateD'=>$request->dateD,
            'dateF'=>$request->dateF,
            'user_id'=>Auth::id(),
           
            // $article->magasins()->attach($request->magasin_id, ['quantite' => 120]),

        ]);
        $pivot = new ArticleMagasin();
        $pivot->article_id = $this->get_max_id('articles');
        $pivot->magasin_id = $this->get_max_id('magasins');
        $pivot->quantite =$request->quantite ;
        $pivot->save();
     
          
        return  redirect()->back()->with('success','L\'article est bien enregester');

    }
    public function get_max_id()
    {
        return DB::table('articles')->max('id');
    }
    
    // methode pour  recuperer un unique article 
    // public function show($id){

        // dd($id);
        // find() lorsque il s'agait de recuperer un element avec sont id select * from Article where id =...
        // $articles=Article::find($id);
        // dd($article);
        // return view('aticles.show',['articles'=> $articles]);
    // }
    public function show(Article $article){
        // 2eme methode en passe l article (tout element en parametre)
        return view('aticles.show',['article'=> $article]);
    }
    
   
    public function  edit(Article $article){
        // 2eme methode en passe l article (tout element en parametre)
        return view('aticles.edit',['article'=> $article]);
    }
    public function update(Article $article,ArticleRequest $request){
        // dd($request); recuprer ce l utilisateur saisir
        // la variable article permet recuprer  l'article dont on souhate faire la maj
        // la variable request recupere les données de formulaire
        $article->titre=$request->titre;
        $article->description=$request->description ;
        $article->dateD=$request->dateD;
        $article->dateF=$request->dateF;
        // apres en ceraser l ancien valeur dans la  BDD 
        $article->save();
        return redirect('/article')->with('success','l\'artcle a  ete MAJ');
    }

    public function delete(Article $article){
        $article->delete();
        return redirect('/article')->with('success','l\'article a  ete supprimer');

    }

    public function search(Request $request){
        // if le champ serach exist dans l url
        if ($request ->filled('search')) {
            $articles=Article::search($request->search)->get();
            
        } else {
            $articles=Article::paginate(3);
        }
        
        return view('recherche',compact('articles'));
    }
    public function recuperer(Request $request){
        $data['q']=$request->query('q');
        $query=Article::join('users','users.id','=','articles.user_id')->where(function($query)use($data){
            $query->where('titre','like','%'.$data['q'].'%');
            $query->orwhere('name','like','%'.$data['q'].'%');
        });
        $data['articles']= $query->paginate(5);
        return view('aticles.listearticle',$data);
    }
    public function mine(){
        // recuprer les article de user qui est  connecter
        // dd(Auth::id());
        // user-id = id de utlisateur connecter
        $myarticles =Article::where('user_id',Auth::id())->get();
       return view('aticles.mine',[
        'myarticles'=>$myarticles
]);

    }
    public function generatepdf(){
        $myarticles =Article::where('user_id',Auth::id())->get();
        $pdf=PDF::loadView('aticles.mine',[
            'myarticles'=>$myarticles
    ]);
         return $pdf->download('pdfview.pdf');
        
         // return $pdf->stream();
    }
   
  


}
