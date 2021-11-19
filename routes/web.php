<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\NatureController;
use App\Http\Controllers\AnalyseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\dashbord\DashbordController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('recubilan', 'hemostase');
Route::view('hemostase', 'hemostase');

Route::get('listeDesPatients',function(){
     $value = Session::get('user');

    // Auth::logout();
    return Auth::user() ;
});


Route::get('get_user',[ConnexionController::class,'getUser']);

Route::get('ad', function () {
   App\Models\User::create([
       'email' => 'admin@gmail.com',
       'password' => bcrypt('12345'),
       'nom_user' => 'Admin Pierre',
   ]);
});

//User connecter
// Route::get('user_connecte',[ConnexionController::class,'user_connecte']); 




Route::get('/exemple',[ConnexionController::class,'example']);

//Connexion
Route::get('/',[ConnexionController::class,'index']);

Route::post('login',[ConnexionController::class,'login']);

Route::get('init_password/{email}',[ConnexionController::class,'init_password'])->name('init_password');
Route::post('init_password',[ConnexionController::class,'confirme_password']);


##########################################################
//Recu



######################################################################
#Middleware

//Init User
Route::get('init_user_analyse',[ConnexionController::class,'init']);

Route::group(['middleware'=>'App\Http\Middleware\AuthMiddleware'],function () {


    //Pdf 
    Route::get('recu',[PdfController::class,'pdf_recu']);
    Route::get('recup',[PdfController::class,'premier_recu']);
    Route::get('recu_resultat/{id}/{code}/{categorie}',[PdfController::class,'recu_resultat']);



    
    ################################################################
    //Se connecter
    
    #######################################################
    Route::get('dashbordAdmin', [DashbordController::class,'index']);
    
    
    ####################################################
    //Ajouter un utilisateur 
    Route::get('ajouter_un_utlisateur',[ConnexionController::class,'view_add_user']);
    
    ####################################################################
    //Patient
    Route::get('ajouterUnPatient', [PatientController::class,'index']);
    //Liste des patients
    Route::get('listeDesPatients', [PatientController::class,'liste']);
    //Update ptient
    Route::post('update_patient',[PatientController::class,'show_patient']);
    
    
    ###################################################################
    
    //Categorie
    
    Route::get('ajouterunecategorie', [CategorieController::class,'index']);
    //Liste
    Route::get('listecategorie',[CategorieController::class,'liste']);
    
    
    #######################################################################
    //Analyse 
    Route::get('ajouteruneanalyse',[AnalyseController::class,'index']);
    
    Route::get('listeanalyse', [AnalyseController::class,'liste']);
    
    
    
    #######
    // Route::get('ajouteruneanalyse', [AnalyseController::class,'nouvelle_analyse']);
    
    ######Reçu du patient
    Route::get('recudupatient',[AnalyseController::class,'recu_patient']);
    
    ###########################################################
    //REsusltat 
    Route::get('resultat_analyse',[ResultatController::class,'index']);


    #######################################################################
    //Liste des resultats 
    Route::get('liste_resultat',[ResultatController::class,'liste_resultat']);
    //Liste des resultats Blades
    Route::get('liste_resultats',[ResultatController::class,'liste_des_resultat']);


    //Update nature analyse 

    Route::post('update_nature_analyse',[NatureController::class,'upade_nature']);








    
});        





