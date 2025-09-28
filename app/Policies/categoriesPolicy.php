<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Categories;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriesPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Categories');
    }

    public function view(AuthUser $authUser, Categories $categories): bool
    {
        return $authUser->can('View:Categories');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Categories');
    }

    public function update(AuthUser $authUser, Categories $categories): bool
    {
        return $authUser->can('Update:Categories');
    }

    public function delete(AuthUser $authUser, Categories $categories): bool
    {
        return $authUser->can('Delete:Categories');
    }

    public function restore(AuthUser $authUser, Categories $categories): bool
    {
        return $authUser->can('Restore:Categories');
    }

    public function forceDelete(AuthUser $authUser, Categories $categories): bool
    {
        return $authUser->can('ForceDelete:Categories');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Categories');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Categories');
    }

    public function replicate(AuthUser $authUser, Categories $categories): bool
    {
        return $authUser->can('Replicate:Categories');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Categories');
    }

}