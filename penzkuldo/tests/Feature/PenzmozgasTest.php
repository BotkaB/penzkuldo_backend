<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Penzmozgas;
use App\Models\Szamla;
use App\Models\User;
use Carbon\Carbon;

class PenzmozgasTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_penzmozgasListaKiirApi(): void
    {
 
      
        $response = $this->get('/api/penzmozgas/');

        $response->assertStatus(200);
    }

    public function test_egyPenzmozgasKiirApi(): void
    {
        $user1 = User::factory()->create();
        $szamla1 = Szamla::factory()->create();

        $user2 = User::factory()->create();
        $szamla2 = Szamla::factory()->create();

        $penzmozgas = Penzmozgas::factory()->create();
        $datum=Carbon::parse($penzmozgas->kuldes_idopont);

        
    $this->withoutMiddleware()->get('/api/penzmozgas/' . $penzmozgas->kuldo_szamla .'/'.$datum, )
    ->assertStatus(200);

    }

    public function test_ujPenzmozgasApi():void
    {
        $user1 = User::factory()->create();
        $szamla1 = Szamla::factory()->create();
        $szamla1 = Szamla::find($szamla1->id);
        $szamla1->egyenleg=321000;
        $szamla1->save();
        $user2 = User::factory()->create();
        $szamla2 = Szamla::factory()->create();
        $szamla2 = Szamla::find($szamla2->id);
        $szamla2->egyenleg=1000;
        $szamla2->save();
        $response = $this->post('api/penzmozgas/', ['kuldo_szamla'=>$szamla1->id, 'cimzett_szamla'=>$szamla2->id, 'osszeg'=>'1000', 'kuldes_idopont'=>'2022-02-22 19:56:47']);
        $response->assertStatus(201);
        $response = $this->post('api/penzmozgas/', ['kuldo_szamla'=>$szamla1->id, 'cimzett_szamla'=>$szamla2->id, 'osszeg'=>'411000', 'kuldes_idopont'=>'2022-02-22 19:56:47']);
        $response->assertStatus(500);
    }

    public function test_penzmozgasModositApi()
    {
        $user1 = User::factory()->create();
        $szamla1 = Szamla::factory()->create();
        $szamla1 = Szamla::find($szamla1->id);
        $szamla1->egyenleg=320000;
        $szamla1->save();
        $user2 = User::factory()->create();
        $szamla2 = Szamla::factory()->create();
        $szamla2 = Szamla::find($szamla2->id);
        $szamla2->egyenleg=30000000;
        $szamla2->save();
        $penzmozgas = Penzmozgas::factory()->create();
        $datum=Carbon::parse($penzmozgas->kuldes_idopont);


        $response = $this->withoutMiddleware()->put('api/penzmozgas/'.$penzmozgas->kuldo_szamla .'/'.$datum,['kuldo_szamla'=>$penzmozgas->kuldo_szamla, 'cimzett_szamla'=>$penzmozgas->cimzett_szamla, 'osszeg'=>'10000', 'kuldes_idopont'=>$penzmozgas->kuldes_idopont]);

        $response->assertStatus(200);
}

}
