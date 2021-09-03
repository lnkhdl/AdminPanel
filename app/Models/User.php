<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The roles that belong to the user.
     * Although many-to-many relation was used, currently it is expected that a user can have only one role.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        return $this->roles[0]->name == 'Administrator';
    }

    /**
     * Scope a query to only include users of a given role.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $roleName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRole($query, $roleName)
    {
        return $query->whereHas('roles', function($q) use ($roleName) {
            $q->whereIn('name', [$roleName]);
        });
    }

    public function scopeSearch($query, $term)
    {
        $term = '%' . trim($term) . '%';

        return $query->where(function ($q) use ($term) {
            $q->where('first_name', 'like', $term)
              ->orWhere('last_name', 'like', $term)
              ->orWhere('email', 'like', $term);
        });
    }
}
