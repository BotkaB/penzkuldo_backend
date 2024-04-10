<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Penzmozgas;
use App\Models\Szamla;
use App\Models\User;

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

        $penzmozgas = Penzmozgas::factory()->make();

        
    $this->withoutMiddleware()->get('/api/penzmozgas/' . $penzmozgas->kuldo_szamla .'/'.$penzmozgas->kuldes_idopont, )
    ->assertStatus(200);

    }

    public function test_ujPenzmozgasApi():void
    {
        $user1 = User::factory()->create();
        $szamla1 = Szamla::factory()->create();

        $user2 = User::factory()->create();
        $szamla2 = Szamla::factory()->create();
      
        $response = $this->post('api/penzmozgas/', ['kuldo_szamla'=>$szamla1->id, 'cimzett_szamla'=>$szamla2->id, 'osszeg'=>'1', 'kuldes_idopont'=>'2022-02-22 19:56:47']);
        $response->assertStatus(201);
    }

    public function test_penzmozgasModositApi()
    {
        $user1 = User::factory()->create();
        $szamla1 = Szamla::factory()->create();

        $user2 = User::factory()->create();
        $szamla2 = Szamla::factory()->create();

        $penzmozgas = Penzmozgas::factory()->make();

        $response = $this->put('api/penzmozgas/'.$penzmozgas->kuldo_szamla .'/'.$penzmozgas->kuldes_idopont,['kuldo_szamla'=>$penzmozgas->kuldo_szamla, 'cimzett_szamla'=>$penzmozgas->cimzett_szamla, 'osszeg'=>'1000', 'kuldes_idopont'=>$penzmozgas->kuldes_idopont]);

        $response->assertStatus(200);
}

}
