<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_analyse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
Use Session;

class ConnexionController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    
    public function index()
    {
        return view('dashbord.login');
    }


    public function login(REQUEST $request)
    {
        
        $password=request('password');
        $email =request('email');
        $user=Auth::attempt(['email' => $email, 'password' => $password]);
        
        // return User::where('email',request('email'))->get();
        
        if ($user) {
            session::put('user',Auth::user());
            $pass= Auth::user()->password;
            if(Hash::check('12345', $pass)){
                $email = Crypt::encrypt($email);
                return redirect()->route('init_password', ['email' => $email]);
            }else {
                Session::flash('succes','Succès. Vous êtes connecté');
                 return redirect('dashbordAdmin');
            }
        }else{
            Session::flash('error','Echec. Email ou Mot de Passe incorrecte');
            return  redirect()->back();
        }
    }

    public function example()
    {
        return view('exemple');
    }

    public function init_password()
    {
       return view('dashbord.initpassword');
    }

    public function confirme_password(REQUEST $request)
    {

        // return $request;
        $email = Auth::user()->email;
        $this->validate($request, [
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ],[
            'confirmed'=> "Les mots de passe ne correspondent pas",
            'required'=>"Les champs sont obligatoires"
        ]);
        
        $user = User::where('email',$email)
                    ->update(['password'=>bcrypt(request('password'))]);


        Auth::logout();
        return redirect('/');
        
    }






    public function view_add_user()
    {
        return view('dashbord.adduser');
    }


    public function add_user(REQUEST $request)
    {
        $data = $request['data'];


        // $errors =$request->$validate([
        //     'nom_user'=>'required',
        //     'email'=>'email|unique:users',
        //     'pseudo'=>'unique:users'
        // ],[
        //     'unique'=>'Cet utilisateur existe deja'
        // ]);

        // if ($validate->fails()) {
        //     $message = 'Cet utilisateur existe deja';
        //    return response()->json($validate);
        // }

        $user = User::create([
            'nom_user'=>$request['nom_user'],
            'email'=>$request['email'],
            'password'=>bcrypt('12345'),
            'prenom_user'=>$request['prenom_user'],
            'adresse_user'=>$request['nom_user'],
            'telephone_user'=>$request['tel_user'],
            'pseudo'=>$request['pseudo']
        ]);

        foreach ($data as $key => $value) {
           
            User_analyse::create([
                'user_id'=>$user->id,
                'categorie_id'=>$value['id']
            ]);
        }

        $success ='SUCCESS';

        return response()->json($success, 200);

    }



    //recuper les anlyse utilisateur 
    public function init(REQUEST $request)
    {
        // $data = User_analyse::find(23)->nature_analyse;
        // $data = User_analyse::find(23)->user;
       $id= Auth::user()->id;
        $data = User_analyse::with('user')
                            ->where('user_id',$id)
                            ->with('categorie')
                            ->get(['categorie_id','user_id']);
        
        return response()->json($data,200);
    }


    public function getUser()
    {
        $id= Auth::user()->id;
        $user = User::where('id',$id)->get();
        return response()->json($user, 200);
    }
}
