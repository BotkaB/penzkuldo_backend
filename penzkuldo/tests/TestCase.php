<?php

namespace Tests;
use App\Models\User;
use App\Models\Szamla;
use App\Models\Penzmozgas;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected function user()
{
    return (User::factory()->make());
}


protected function szamla()
{
   
    $user = $this->user();
   
    $user->save();
    return (Szamla::factory()->make());
}

}
