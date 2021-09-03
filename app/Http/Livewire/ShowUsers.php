<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    public $byRole = "";
    public $search = "";
    public $sortByColumn = "id";
    public $sortOrder = "asc";

    public function setSortBy($column)
    {
        $this->sortOrder = $this->sortByColumn === $column ? ($this->sortOrder === 'asc' ? 'desc' : 'asc') : 'asc';
        $this->sortByColumn = $column;
    }

    public function render()
    {
        return view('livewire.show-users',[
            'users' => User::query()->when($this->byRole, function($q) {
                                           $q->ofRole($this->byRole);
                                      })
                                    ->when($this->search, function($q) {
                                           $q->search($this->search);
                                      })
                                    ->join('role_user', 'users.id', '=', 'role_user.user_id')
                                    ->join('roles', 'role_user.role_id', 'roles.id')
                                    ->select('users.*', 'roles.name AS role_name')
                                    ->orderBy($this->sortByColumn, $this->sortOrder)
                                    ->get(),
            'roles' => Role::pluck('name', 'id')
        ]);
    }
}
