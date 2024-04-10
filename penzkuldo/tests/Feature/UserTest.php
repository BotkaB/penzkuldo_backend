<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
   use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_userListaKiirApi(): void
    {
 
      
        $response = $this->get('/api/users/');

        $response->assertStatus(200);
    }

    public function test_egyUserKiirApi(): void
    {
        $user = User::factory()->make();
    $this->withoutMiddleware()->get('/api/users/' . $user->user_id)
    ->assertStatus(200);

    }

    public function test_ujUserApi():void
    {
        
      
        $response = $this->post('api/users/', ['name'=>'Kovács Jánosné', 'email'=>'cfsd@gfj.hu', 'password'=>'Almafa23??']);
        $response->assertStatus(201);
    }

    public function test_userModositApi()
    {
        $user = User::factory()->create();
       
     
        $response = $this->put('api/users/'.$user->user_id, ['name'=>'Kovács Jánoska', 'email'=>'cdcfsdsdf@gfj.hu', 'password'=>'KAlmafa112323??']);

        $response->assertStatus(200);
}

}
