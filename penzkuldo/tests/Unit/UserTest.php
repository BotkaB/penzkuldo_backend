<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

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
        $user = User::factory()->make([
            'name' => 'Kiss Pista',
            'email' => 'sdfg@gfhdj.hu',
            'password' => 'jbhegvkjzgbbfjalgl13!'
        ]);
        $this->assertEquals($user->name, 'Kiss Pista');
    }
}
