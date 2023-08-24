<?php

namespace App\Http\Controllers\UserControllers;
use App\Http\Requests\CreateUserRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserLoginRequest;
use App\Models\Role;
use App\Models\role_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function liste(){
      
        $users=User::All();
        return  view('users.listeusers',['users'=> $users]);

    }
    public function register(){
        return view('users.register');
    }
    // save photo dans le dossier $file->hashName();
    
     public function handleregister(User $user,CreateUserRequest $request){
        // Storage::disk('local')->put('images', $request->avatar );
        // die();

    //     $file_name=time().'.'.$request->photo->extension();
    //     // dd($file_name);

    //    $path=$request->file('photo')->storeAs(
    //     'avatars',
    //     $file_name,
    //     'public'

    // );
    $image = $request->file('photo');
    $imageName = time() . '.' . $image->extension();
    $image->move(public_path('images'), $imageName);
    // dd( $image);
        


    //     $file_extension=$request->photo->extension();
    //     $file_name=$file_extension->hashName().'.'.$file_extension;
    //     $path='images/emplois';
    //     $request->photo->move($path,$file_name);


    // $user::create([
        $user->name=$request->nom;
      $user->email=$request->email;
       
       $user->password=Hash::make($request->password);
       $user->photo=$imageName;
       $user->role=$request->role;
       $user->save();
        // 'name'=>$request->nom,
        // 'email'=>$request->email,
        // 'password'=>Hash::make($request->password),
        // 'photo'=>$imageName,
        // 'role'=>$request->role,
   
       
        // $article->magasins()->attach($request->magasin_id, ['quantite' => 120]),

    // ]);
    //    $user->name=$request->nom;
    //    $user->email=$request->email;
       
    //    $user->password=Hash::make($request->password);
    //     $user->photo=$imageName;

        // $role = new Role();
        // $role->name =$request->role ;
        // $role->user_id =$this->get_max_id();
        // $role->save();

        // $pivot = new role_user();
        
        // $pivot->user_id = $this->get_max_id('users');
        // $pivot->role_id = $this->get_max_id('roles');
        // $pivot->save();
        return redirect('/article')->with('success','votre compte  a ete cree connecter vous');
    //     // dd($user);


     }
    //  public function get_max_id()
    //  {
    //      return DB::table('users')->max('id');
    //  }

    public function login(){
        return view('users.login');
    }
    public function handleLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //Auth:: est un pluing de laravel permet de gerer l'authentification
        //avec php veut dire::SELECT FORM  USERS WHERE EMAIL=$email && password=$password
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
         
            
        }else {
            //aucun element trouve
          return redirect()->back()->with('error','Information de connexion non reconue');
        }

    }
    public function dashboard(){
        return view('dashboard');
    }
    public function logout(){
        // retourner la session actuelment  
        Session::flush();
        Auth::logout();
        return redirect('login');
      
        }
        /**
         * to update status of User
         * @param Integer $user_id
         * @param Integer $status_code
         * @return Success Response,
         */
        
          // active desactive un compte
       public function updatestatus($user_id,$status_code){
        try {
             $update_user=User::whereId($user_id)->update(
                ['status'=>$status_code

             ]);
             if($update_user){
                return redirect()->back()->with('sucess','user statue update succesFully');
             }else{
                return redirect()->back()->with('error','fait to update user status');

             }
        } catch (\Throwable $th) {
            //throw $th;
        }

       }





       //active desactive

       public function activateUser($id) {
        $user = User::find($id);
        if ($user) {
            $user->activateAccount();
            return redirect()->back()->with('sucess', 'User account activated successfully');
        } else {
            return redirect()->back()->with('error', 'User account not found');
        }
    }
    
    public function deactivateUser($id) {
        $user = User::find($id);
        if ($user) {
            $user->deactivateAccount();
            return redirect()->back()->with('sucess', 'User account deactivated successfully');
        } else {
            return redirect()->back()->with('error', 'User account not found');
        }
    }

    }
