<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penzmozgas extends Model
{
    use HasFactory;

   /* public $timestamps = false;

    public function timestamp()
    {
        $this->kuldes_idopont = time();
    }
    */

    protected $table = 'penzmozgas';
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('kuldo_szamla', '=', $this->getAttribute('kuldo_szamla'))
            ->where('kuldes_idopont', '=', $this->getAttribute('kuldes_idopont'));


        return $query;
    }

    protected $fillable = [
        'kuldo_szamla',
        'cimzett_szamla',
        'osszeg',
        'kuldes_idopont',
    ];
}
