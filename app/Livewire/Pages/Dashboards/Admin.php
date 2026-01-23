<?php

namespace App\Livewire\Pages\Dashboards;

use Livewire\Component;
use App\Enums\UserRoles;
use App\Models\User;
use App\Models\ContactMessage;

class Admin extends Component
{
    public function render()
    {
        $count_super_admins = User::where('role', UserRoles::SUPER_ADMIN)->count();
        $count_admins = User::where('role', UserRoles::ADMIN)->count();
        $count_users = User::whereNotIn('role', [UserRoles::SUPER_ADMIN, UserRoles::ADMIN])->count();

        $count_messages = ContactMessage::count();
        $count_unread_messages = ContactMessage::where('is_read', false)->count();


        return view('livewire.pages.dashboards.admin', compact(
            'count_super_admins',
            'count_admins',
            'count_users',

            'count_messages',
            'count_unread_messages',
        ));
    }
}
