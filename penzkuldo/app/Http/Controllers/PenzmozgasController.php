<?php

namespace App\Http\Controllers;

use App\Models\Penzmozgas;
use Illuminate\Http\Request;



class PenzmozgasController extends Controller
{
    public function index()
    {
        return Penzmozgas::all();
    }

    public function show($id)
    {
        $penzmozgas = response()->json(Penzmozgas::find($id));
        return $penzmozgas;
    }

    public function store(Request $request)
    {
        $penzmozgas = new Penzmozgas();
        $penzmozgas->kuldo_szamla = $request->kuldo_szamla;
        $penzmozgas->cimzett_szamla = $request->cimzett_szamla;
        $penzmozgas->osszeg = $request->osszeg;
        $penzmozgas->kuldes_idopont = $request->kuldes_idopont;
        
        $penzmozgas->save();
        return $penzmozgas;
    }

    public function update(Request $request, $id)
    {
        $penzmozgas = Penzmozgas::find($id);
    
        $penzmozgas->kuldo_szamla = $request->kuldo_szamla;
        $penzmozgas->cimzett_szamla = $request->cimzett_szamla;
        $penzmozgas->osszeg = $request->osszeg;
        $penzmozgas->kuldes_idopont = $request->kuldes_idopont;
       
        $penzmozgas->save();
        return $penzmozgas;
    }

   
    public function destroy($id)
    {
        Penzmozgas::find($id)->delete();
        return "Sikeres törlés";
    }

  
}
