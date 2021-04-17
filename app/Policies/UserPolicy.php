<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return mixed
     */
    public function viewAny()
    {
        $userPermissions = auth()->user()->roles[0]->permissions->map->only(['name'])->pluck('name');
        return in_array('user.viewAny', $userPermissions->toArray());
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return mixed
     */
    public function view()
    {
        $userPermissions = auth()->user()->roles[0]->permissions->map->only(['name'])->pluck('name');

        return in_array('user.view', $userPermissions->toArray());
    }

    /**
     * Determine whether the user can create models.
     *
     * @return mixed
     */
    public function create()
    {
        $userPermissions = auth()->user()->roles[0]->permissions->map->only(['name'])->pluck('name');

        return in_array('user.create', $userPermissions->toArray());
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return mixed
     */
    public function update()
    {
        $userPermissions = auth()->user()->roles[0]->permissions->map->only(['name'])->pluck('name');

        return in_array('user.update', $userPermissions->toArray());
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return mixed
     */
    public function delete()
    {
        $userPermissions = auth()->user()->roles[0]->permissions->map->only(['name'])->pluck('name');

        return in_array('user.delete', $userPermissions->toArray());
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        return false;
    }
}
