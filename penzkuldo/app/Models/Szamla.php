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

   
  
    public function szamlaPenzMozgasok()
    {    
        return $this->hasMany(Penzmozgas::class,  'kuldo_szamla', 'id');
    }

    
   
}
