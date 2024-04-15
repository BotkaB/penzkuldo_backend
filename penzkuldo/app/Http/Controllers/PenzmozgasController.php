<?php

namespace App\Http\Controllers;

use App\Models\Penzmozgas;
use App\Models\Szamla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;





class PenzmozgasController extends Controller
{
    public function index()
    {
        return Penzmozgas::all();
    }

    public function show($kuldo_szamla, $kuldes_idopont)
    {
        $error = "Nincs ilyen pénzmozgás";
        $penzmozgas = Penzmozgas::where('kuldo_szamla', $kuldo_szamla)
        ->where('kuldes_idopont', $kuldes_idopont)
        ->first();

        if ($penzmozgas == null) {
            throw ($error);
        }

            return $penzmozgas;
       
    }

    public function store(Request $request)
    {
        $error = "Nincs fedezet.";

        $penzmozgas = new Penzmozgas();
        $kuldoId = $penzmozgas->kuldo_szamla = $request->kuldo_szamla;
        $kuldo = Szamla::find($kuldoId);
        $cimzettId = $penzmozgas->cimzett_szamla = $request->cimzett_szamla;
        $cimzett = Szamla::find($cimzettId);

        $kuldoEgyenleg = $kuldo->egyenleg;
        $cimzettEgyenleg = $cimzett->egyenleg;
        $penzmozgas->kuldo_szamla = $request->kuldo_szamla;
        $penzmozgas->cimzett_szamla = $request->cimzett_szamla;
        $osszeg = $penzmozgas->osszeg = $request->osszeg;
        $penzmozgas->kuldes_idopont = $request->kuldes_idopont;

       
        $ujKuldoEgyenleg =  $kuldoEgyenleg-$osszeg;
        $ujCimzettEgyenleg = $osszeg + $cimzettEgyenleg;

        if($ujKuldoEgyenleg<0){
            throw($error);
        }
       
        $penzmozgas->save();

        DB::table("szamlas")
            ->where(['id' => $kuldoId])
            ->update(['egyenleg' => $ujKuldoEgyenleg]);


        DB::table("szamlas")
            ->where(['id' => $cimzettId])
            ->update(['egyenleg' => $ujCimzettEgyenleg]);

        return $penzmozgas;
    }

    public function update(Request $request, $kuldo_szamla, $kuldes_idopont)
    {
        $penzmozgas = $this->show($kuldo_szamla, $kuldes_idopont);

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


    public function bejelentkezettFelhasznaloPenzmozgasai(){
        
        $user = Auth::user()->user_id;
        
            return DB::select("SELECT sz.szamlaszam as szamlam, szc.szamlaszam as cimzett, osszeg, kuldes_idopont, sz.egyenleg FROM penzmozgas as p 
            join szamlas as sz on p.kuldo_szamla=sz.id
            join szamlas as szc on p.cimzett_szamla=szc.id
            join users as u on sz.user_id=u.user_id
            where u.user_id=$user
            order by p.kuldes_idopont Desc;");

           
    }
}
