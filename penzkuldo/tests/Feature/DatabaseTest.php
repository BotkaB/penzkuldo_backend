<?php

namespace Tests\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;


use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Penzmozgas;
use App\Models\Szamla;

class DatabaseTest extends TestCase

{
    use RefreshDatabase;

    /*
     * A basic feature test example.
   
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
      */

      public function test_Db()
      {
        $this->seed();
        User::factory()->count(10)->create();
       
       $this->assertDatabaseCount('users',32);

       Szamla::factory()->count(15)->create();
       $this->assertDatabaseCount('szamlas',45);

       Penzmozgas::factory()->count(150)->create();
       $this->assertDatabaseCount('penzmozgas',350);

       User::factory()->create(
        ['name'=>'Fodor Balázs',
        'email'=>'otifh@hkbm.com',
        'password'=>'pass11word' ]);
     
       $this->assertDatabaseHas('users', ['name'=>'Fodor Balázs']);
    
    }
}
