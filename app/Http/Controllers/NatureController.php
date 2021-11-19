<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nature_analyse;

class NatureController extends Controller
{
    public function upade_nature(REQUEST $request)
    {
        $nature_analyse = Nature_analyse::where('id',request('id'))
                                         ->update([
                                                 'libelle_analyse'=>request('libelle'),
                                                 'prix_unitaire'=>request('prix')
                                                ]);
        
        return response()->json($nature_analyse,200);
    }
}
