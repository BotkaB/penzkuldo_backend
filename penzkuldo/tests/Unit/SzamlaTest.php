<?php

namespace Tests\Unit;

/*use PHPUnit\Framework\TestCase;*/
use Tests\TestCase;
use App\Models\Szamla;
class SzamlaTest extends TestCase
{
    /*
     * A basic unit test example.
  
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

         */

       public function test_szamla_adatModosit()
       {
         
           $user = $this->user();
          $user->save();
           $szamla =  $this->szamla();
           $szamla->save();
        
           $response = $this->put('api/szamla/'.$szamla->id, ['user_id'=>$szamla->user_id, 'szamlaszam'=>$szamla->szamlaszam, 'egyenleg'=>'0']);
   
    
           $szamla = Szamla::find($szamla->id);
           $this->assertEquals($szamla->egyenleg, 0);
           $this->assertNotEquals($szamla->egyenleg, 1000);
         
}
}
