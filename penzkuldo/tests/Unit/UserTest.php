<?php

namespace Tests\Unit;

/*use PHPUnit\Framework\TestCase;*/

use Tests\TestCase;
use App\Models\User;
use App\Controllers\UserController;


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

    public function test_ujFelhasznalo_joAdat()
    {
        $user = User::factory()->make([
            'name' => 'Kiss Pista',
            'email' => 'sdfg@gfhdj.hu',
            'password' => 'jbhegvkjzgbbfjalgl13!'
        ]);
        $this->assertEquals($user->name, 'Kiss Pista');
    }

    public function test_ujFelhasznalo_rosszAdat()
    {
        $user = User::factory()->make([
            'name' => 'Kiss József',
            'email' => 'sdfg@gfhdj.hu',
            'password' => 'jbhegvkjzgbbfjalgl13!'
        ]);
        $this->assertNotEquals($user->name, 'Kiss Pista');
    }
}
