<?php

namespace Tests\Unit;

/*use PHPUnit\Framework\TestCase;*/
use Tests\TestCase;
use App\Models\Szamla; 
use App\Models\Penzmozgas;
use Carbon\Carbon;

class PenzmozgasTest extends TestCase
{
    /*
     * A basic unit test example.
    
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
     */

     public function test_Penzmozgas()
     {
       
       
         $szamla1 =  $this->szamla();
         $szamla1->save();
         $szamla1 = Szamla::find($szamla1->id);
         $szamla1->egyenleg=20000;
         $szamla1->save();
         $szamla2 =  $this->szamla();
         $szamla2->save();
         $szamla2 = Szamla::find($szamla2->id);
         $szamla2->egyenleg=300000;
         $szamla2->save();
         $szamla3 =  $this->szamla();
         $szamla3->save();
         $szamla3 = Szamla::find($szamla3->id);
         $szamla3->egyenleg=150000;
         $szamla3->save();
      
         $response = $this->post('api/penzmozgas/', ['kuldo_szamla'=>$szamla1->id, 'cimzett_szamla'=>$szamla2->id, 'osszeg'=>'10000', 'kuldes_idopont'=>'2022-03-22 19:56:47']);
         $szamla1 = Szamla::find($szamla1->id);
         $this->assertEquals($szamla1->egyenleg, 10000);
         $szamla2 = Szamla::find($szamla2->id);
         $this->assertEquals($szamla2->egyenleg, 310000);
         $szamla3 = Szamla::find($szamla3->id);
         $this->assertEquals($szamla3->egyenleg, 150000);
       
}


}
