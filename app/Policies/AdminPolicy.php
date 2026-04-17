<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(?Admin $admin): bool
    {
        return $admin->can('viewAdmin');
    }

    public function create(Admin $admin): bool
    {
        return $admin->can('createAdmin');
    }

    public function update(Admin $admin): bool
    {
        return $admin->can('editAdmin');
    }

    public function delete(Admin $admin): bool
    {
        return $admin->can('deleteAdmin');
    }
}
