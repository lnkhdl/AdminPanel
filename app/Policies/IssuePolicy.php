<?php

namespace App\Policies;

use App\Models\Issues\Issue;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IssuePolicy
{
    use HandlesAuthorization;

    public function viewAny()
    {
        $userPermissions = auth()->user()->roles[0]->permissions->map->only(['name'])->pluck('name');
        return in_array('issue.any', $userPermissions->toArray());
    }

    public function viewMy()
    {
        $userPermissions = auth()->user()->roles[0]->permissions->map->only(['name'])->pluck('name');
        return in_array('issue.my', $userPermissions->toArray());
    }

    public function view(User $user, $range)
    {
        $userPermissions = $user->roles[0]->permissions->map->only(['name'])->pluck('name');

        if (in_array('issue.any', $userPermissions->toArray())) {
            return true;
        } else if (($range === 'my_reported' || $range === 'my_assigned') && in_array('issue.my', $userPermissions->toArray())) {
            return true;
        } else {
            return false;
        }
    }
    
    public function manage(User $user, Issue $issue)
    {
        $userPermissions = auth()->user()->roles[0]->permissions->map->only(['name'])->pluck('name');

        if (in_array('issue.any', $userPermissions->toArray())) {
            return true;
        }
        
        if (in_array('issue.my', $userPermissions->toArray())) {
            if ($issue->reporetd_by === $user->id || $issue->assigned_to === $user->id) {
                return true;
            }
        }
        
        return false;
    }
}