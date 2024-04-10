<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Szamla;
use App\Models\User;




class SzamlaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_szamlaListaKiirApi(): void
    {


        $response = $this->get('/api/szamla/');

        $response->assertStatus(200);
    }

    public function test_egySzamlaKiirApi(): void
    {

        $user = User::factory()->create();
        $szamla = Szamla::factory()->create();


        $this->withoutMiddleware()->get('/api/szamla/' . $szamla->id)
            ->assertStatus(200);
    }

    public function test_ujSzamlaApi(): void
    {
        $user = User::factory()->create();

       
        $response = $this->post('api/szamla/', ['user_id'=>$user->user_id, 'szamlaszam'=>'1232134963243', 'egyenleg'=>'200']);
        $response->assertStatus(201);
    }

    public function test_szamlaModositApi()
    {
        $user = User::factory()->create();
        $szamla = Szamla::factory()->create();
     
        $response = $this->put('api/szamla/'.$szamla->id, ['user_id'=>$szamla->user_id, 'szamlaszam'=>$szamla->szamlaszam, 'egyenleg'=>'0']);

        $response->assertStatus(200);
}
}
