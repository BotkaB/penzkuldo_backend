<?php

namespace Tests\Unit;

/*use PHPUnit\Framework\TestCase;*/

use Tests\TestCase;
use App\Models\User;
use App\Controllers\UserController;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Http\Request;

class UserTest extends TestCase
{
    /*
     * A basic unit test example.
     
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
    */



    public function test_ujFelhasznalo()
    {

        $user = $this->user();


        $user->name = "Kiss Pista";

        $this->assertEquals($user->name, 'Kiss Pista');
        $this->assertNotEquals($user->name, 'Kiss József');
    }



    public function test_felhasznalo_adatModosit()
    {
      
        $user = $this->user();

        $user->save();
        $response = $this->put('api/users/' . $user->user_id, ['name' => 'Kiss Józsefné', 'email' => $user->email, 'password' => $user->password]);
        $user = User::find($user->user_id);
        $this->assertEquals($user->name, 'Kiss Józsefné');
        $this->assertNotEquals($user->name, 'Kiss József');
    }
}
