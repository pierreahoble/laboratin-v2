<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use App\Models\Categorie;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function pdf_recu()
    {
        return view('pdfviews.recu');
    }



    public function premier_recu()
    {
        return view('pdfviews.recup');
    }



    public function recu_resultat(REQUEST $request)
    {
        $code = $request['code'];
        $id = $request['id'];
        $categorie_id = $request['categorie'];
        $resultats = Analyse::where('id',$id)
                                    ->where('code',$code)
                                    ->with('resultat')
                                    ->with('patient')
                                    ->get();
         $patient =  $resultats[0]->patient;
         $analyse =  $resultats[0];
        $resultats =  $resultats[0]->resultat;


        if (intval($categorie_id) === intval(5) && count($resultats)>0) {
            return view('pdfviews.hemostase',[
                'analyse'=>$analyse,
                'resultats'=>$resultats,
                'patient'=>$patient
            ]);
        }
        else if (intval($categorie_id) === intval(3) && count($resultats)>0) {
            return view('pdfviews.tyroidien',[
                'analyse'=>$analyse,
                'resultats'=>$resultats,
                'patient'=>$patient
            ]);
        }

        else if (intval($categorie_id) === intval(4) && count($resultats)>0) {
            return view('pdfviews.sanguin',[
                'analyse'=>$analyse,
                'resultats'=>$resultats,
                'patient'=>$patient
            ]);
        }

        else if (intval($categorie_id) === intval(2) && count($resultats)>0) {
            return view('pdfviews.toxorub',[
                'analyse'=>$analyse,
                'resultats'=>$resultats,
                'patient'=>$patient
            ]);
        }

        else if (intval($categorie_id) === intval(1) && count($resultats)>0) {
            return view('pdfviews.immuno',[
                'analyse'=>$analyse,
                'resultats'=>$resultats,
                'patient'=>$patient
            ]);
        }
        else{
            return redirect()->back();
        }
       

    }



    public function return_view($id,$resultats)
    {
        $patient =  $resultats[0]->patient;
        $analyse =  $resultats[0];
        $resultats=  $resultats[0]->resultat;
        $categorie = Categorie::all();
        foreach ($categorie as $key => $value) {
            if (intval($value['id']) === intval(11)) {
                return $value['id'];
                return view('pdfviews.hemostase',[
                    'analyse'=>$analyse,
                    'resultats'=>$resultats,
                    'patient'=>$patient
                ]);
            }
        }
    }




}
