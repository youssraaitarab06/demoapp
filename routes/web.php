<?php
use App\Http\Controllers\ArticleControllers\ArticleController;
use App\Http\Controllers\UserControllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SearchController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route si une action a appller lorsque on lancer un url
Route::get('/', function () {
    return view('welcome');
});
Route::get('/pagestatique', function () {
    return view('pagestatique');
});
Route :: get ( '/' , [SearchController::class,'index'] ) ;

Route :: get ( '/liste' , [UserController::class,'liste'] ) ;

Route :: get ( '/search' , [SearchController::class,'recherche'] ) ;
// Route :: get ( '/search' , 'SearchController@search' ) ;
// get la methode de l url
// '/test' adresse ou sous la action (fonction) sa sera fait
// passer les parametre en route  userName si la nom de paramatre et apers dans la  TestController en passe comme une variable en paramettre de la methode1
Route::get('/test/{userName}',[TestController::class,'methode1']);
Route::get('/exemple',[TestController::class,'exemple']);
// Route::get('/accueil',function(){
//     return view('accueil');

// });
Route::get('/accueil',[TestController::class,'accueil']);
// Route::get('article',[ArticleController::class,'store'])->name('article');
// Route::post('article',[ArticleController::class,'store'])->name('article');
Route::get('/users/{id}/activate', [UserController::class, 'activateUser'])->name('users.activate');
Route::get('/users/{id}/deactivate', [UserController::class, 'deactivateUser'])->name('users.deactivate');
// guest est  middleware lorsque n est pas connecter  et il rediriger vers page  home pardefaut lorsque il est authentifier (si en avec ces route)
Route::middleware(['guest'])->group(function(){
    Route::get('/register',[UserController::class,'register'])->name('register');
    Route::post('/register',[UserController::class,'handleregister'])->name('register');
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/login',[UserController::class,'handleLogin'])->name('login');
});


//  Route::get('/search',[ArticleController::class,'search'])->name('search');
//  Route::get('/join',[ArticleController::class,'recuperer'])->name('join');
//  Route::get('/logout',[UserController::class,'logout'])->name('logout.user');

// Route::get('dashboard',[UserController::class,'dashboard']);


// utiliser les middlware pour indique que touts les route  article  soit visible lorsque que lutilisateur est connetrer
// Route::middleware(['auth'])->group(function(){
    // grouper les routes avec un perifix
// Route::prefix('/article')->group(function(){
    // Route::get('/',[ArticleController::class,'index'])->withoutMiddleware('auth');
    // Route::get('/article/{id}',[ArticleController::class,'show'])->name('/article/{id}');
    // Route::get('/{article}',[ArticleController::class,'show'])->name('/article/{article}');
    // Route::get('/{article}/edit',[ArticleController::class,'edit'])->name('article.editer');
    // Route::put('/{article}/update',[ArticleController::class,'update'])->name('article.update');
    // Route::delete('/{article}/delete',[ArticleController::class,'delete'])->name('article.delete');
 Route::get('/users/status/{user_id}/{status_code}',[UserController::class,'updatestatus'])->name('updatestatus');


    
// });




Route::get('home',[UserController::class,'dashboard']);

// Route::get('/mine',[ArticleController::class,'mine'])->name('article.mine');
Route::get('/generatepdf',[ArticleController::class,'generatepdf'])->name('article.generatepdf');
Route::get('/logout',[UserController::class,'logout'])->name('logout');


// });
// Route::middleware(['auth', 'role:admin' ])->group(function(){
    Route::prefix('/article')->group(function(){
     Route::get('/',[ArticleController::class,'index'])->withoutMiddleware('auth');
    Route::get('/{article}',[ArticleController::class,'show'])->name('/article/{article}');
    Route::get('/{article}/edit',[ArticleController::class,'edit'])->name('article.editer');
    Route::put('/{article}/update',[ArticleController::class,'update'])->name('article.update');
    Route::delete('/{article}/delete',[ArticleController::class,'delete'])->name('article.delete');
    Route::get('article',[ArticleController::class,'store'])->name('article');
    Route::post('article',[ArticleController::class,'store'])->name('article');
// });
 Route::get('/mine',[ArticleController::class,'mine'])->name('article.mine');

});
// Route::middleware(['auth', 'role:admin'])->group(function(){
// });
Route::middleware(['auth', 'agent:agent'])->group(function(){
    Route::get('/search',[ArticleController::class,'search'])->name('search');
    Route::get('/join',[ArticleController::class,'recuperer'])->name('join');
    // Route::get('/mine',[ArticleController::class,'mine'])->name('article.mine');
});