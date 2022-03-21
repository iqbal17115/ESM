<?php

namespace App\Http\Livewire\UserManagement;

use App\Models\User;
use Livewire\Component;

class AllUserList extends Component
{
    public function render()
    {
        $users = User::whereType('Admin');
        return view('livewire.user-management.all-user-list',[
            'users'=>$users->get(),
        ]);
    }
}
