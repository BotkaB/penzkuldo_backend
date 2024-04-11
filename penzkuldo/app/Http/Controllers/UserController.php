<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        $felhasznalo = response()->json(User::find($id));
        return $felhasznalo;
    }

    public function store(Request $request)
    {
        $felhasznalo = new User();
        $felhasznalo->name = $request->name;
        $felhasznalo->email = $request->email;
        $felhasznalo->password = Hash::make($request->password);
       
        $felhasznalo->save();
        return $felhasznalo;
    }

    public function update(Request $request, $id)
    {
        $felhasznalo = User::find($id);
    
        $felhasznalo->name = $request->name;
        $felhasznalo->email = $request->email;
        $felhasznalo->password = Hash::make($request->password);
       
        $felhasznalo->save();
        return $felhasznalo;
    }

   
    public function destroy($id)
    {
        User::find($id)->delete();
        return "Sikeres törlés";
    }

    
}

