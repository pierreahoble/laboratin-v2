<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient.index');
    }

    public function liste()
    {
        $patients = Patient::all();
        return view('patient.liste',[
            'patients'=>$patients
        ]);
    }


    //Ajouter un patient 

    public function ajouter_patient(REQUEST $request){

        // return $request;

        $data = Patient::create([
            'nom_patient'=>request('nom'),
            'prenom_patient'=>request('prenom'),
            'age_patient'=>request('age'),
            'telephone_patient'=>request('telephone'),
            'nom_accompagnant_patient'=>request('nom'),
            'telephone_accompagnant_patient'=>request('telAccompagnant'),
            'observation'=>request('observation'),
            'email_patient'=>'patient@gmail.com',
            'adresse'=>request('adresse')
        ]);
        return response()->json($data, 200);
    }

    //recuperer un patient specifique

    public function recupere_un_patient(REQUEST $request)
    {
         $nom_patient = Patient::where('nom_patient','like','%'.$request['nom_patient'].'%')->get();

        return $nom_patient;

    }


    public function show_patient(REQUEST $request)
    {
       

        $patient = Patient::where('id',request('id'))->update([
            'nom_patient' =>request('nom'),
            'prenom_patient'  =>request('nom'),
            'age_patient'  =>request('age'),
            'telephone_patient'  =>request('telephone'),
            'nom_accompagnant_patient'  =>request('nomAccompagnant'),
            'telephone_accompagnant_patient'  =>request('telAccompagnant'),
            'observation'  =>request('observation'),
            'adresse' =>request('adresse')
            // 'email_patient'  =>request('nom'),
        ]);
        
        return $patient;
        
    }


}
