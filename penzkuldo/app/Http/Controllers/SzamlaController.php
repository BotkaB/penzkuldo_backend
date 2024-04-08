<?php

namespace App\Http\Controllers;

use App\Models\Szamla;
use Illuminate\Http\Request;


class SzamlaController extends Controller
{
    public function index()
    {
        return Szamla::all();
    }

    public function show($id)
    {
        $szamla = response()->json(Szamla::find($id));
        return $szamla;
    }

    public function store(Request $request)
    {
        $szamla = new Szamla();
        $szamla->szamlaszam = $request->szamlaszam;
        $szamla->egyenleg = $request->egyenleg;
       
       
        $szamla->save();
        return $szamla;
    }

    public function update(Request $request, $id)
    {
        $szamla = Szamla::find($id);
    
        $szamla->szamlaszam = $request->szamlaszam;
        $szamla->egyenleg = $request->egyenleg;
    
       
        $szamla->save();
        return $szamla;
    }

   
    public function destroy($id)
    {
        Szamla::find($id)->delete();
        return "Sikeres törlés";
    }

  
}
