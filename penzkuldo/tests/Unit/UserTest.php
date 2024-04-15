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
   
    } 
}
