<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Szamla extends Model
{
    use HasFactory;

  

    protected $fillable = [
     
        'szamlaszam',
        'egyenleg',
    ];


    public function felhasznalokSzamlai()
    {  return $this->belongsTo(User::class, 'user_id', 'user_id' );   }

    public function egyFelhasznaloSzamlai($id){
        $user =  User::find($id);
        $szamlak = User::with('felhasznalokSzamlai')->where('user_id','=',$user->user_id)->get();
        return $szamlak;
}
  
    public function szamlaPenzMozgas()
    {    
        return $this->hasMany(Penzmozgas::class, 'id', 'id');
    }
   
}
