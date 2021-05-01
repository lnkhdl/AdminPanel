<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Database\Seeders\PermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPolicyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @dataProvider provideRouteData
     */
    public function user_can_access_user_routes_based_on_assigned_permission(string $permissionName, string $method, string $route, int $status)
    {
        $this->createPermissions();
        $this->createRolesBasedOnPermissions();

        $roles = Role::all();

        foreach ($roles as $role) {
            $user = User::factory()->create();
            $user->roles()->sync($role->id);

            $this->actingAs($user);
            $response = $this->call($method, $route);
            
            if ($role->permissions[0]->name == $permissionName) {
                $response->assertStatus($status);
            } else {
                $response->assertForbidden();
            }
        }
    }
    
    /**
     * @test
     * @dataProvider provideRouteData
     */
    public function user_with_all_permissions_can_access_all_user_routes(string $permissionName, string $method, string $route, int $status)
    {
        $this->createPermissions();
        $this->createRoleWithAllPermissions('AllPermissions');

        $user = User::factory()->create();
        $user->roles()->sync([Role::where('name', 'AllPermissions')->first()->id]);

        $this->actingAs($user);
        $response = $this->call($method, $route);
        $response->assertStatus($status);
    }

    /**
     * @test
     * @dataProvider provideRouteData
     */
    public function user_without_permissions_cannot_access_any_user_route(string $permissionName, string $method, string $route, int $status)
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'User']);
        $user->roles()->sync([Role::where('name', 'User')->first()->id]);

        $this->actingAs($user);
        $response = $this->call($method, $route);
        $response->assertForbidden();
    }

    private function createPermissions()
    {
        $this->seed(PermissionSeeder::class);
    }

    private function createRolesBasedOnPermissions()
    {
        $permissions = Permission::where('name', 'like', 'user.%')->get();

        foreach ($permissions as $permission) {
            $role = Role::create(['name' => 'role.' . $permission->name]);
            $role->permissions()->sync([$permission->id]);
        }
    }

    private function createRoleWithAllPermissions(string $roleName)
    {
        $permissions = Permission::where('name', 'like', 'user.%')->get();
        $permissionArray = [];

        foreach ($permissions as $permission) {
            array_push($permissionArray,$permission->id);
        }

        $role = Role::create(['name' => $roleName]);
        $role->permissions()->sync($permissionArray);
    }   

    public function provideRouteData()
    {
        return [
            'user.viewAny' => [
                'user.viewAny',
                'get',
                '/users',
                200
            ],
            'user.view' => [
                'user.view',
                'get',
                '/users/1',
                200
            ],
            'user.create' => [
                'user.create',
                'get',
                '/users/create',
                200
            ],

            'user.edit' => [
                'user.update',
                'get',
                '/users/1/edit',
                200
            ],

            'user.update' => [
                'user.update',
                'put',
                '/users/1',
                302
            ],

            'user.delete' => [
                'user.delete',
                'DELETE',
                '/users/1',
                302
            ],
        ];
    }
}
