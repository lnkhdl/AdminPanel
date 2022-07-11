<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createUserWithSpecificRole(string $roleName)
    {
        $user = User::factory()->create();
        $user->roles()->sync([Role::where('name', $roleName)->first()->id]);
        return $user;
    }
}
