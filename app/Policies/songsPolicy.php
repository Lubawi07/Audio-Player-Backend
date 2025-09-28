<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Songs;
use Illuminate\Auth\Access\HandlesAuthorization;

class SongsPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Songs');
    }

    public function view(AuthUser $authUser, Songs $songs): bool
    {
        return $authUser->can('View:Songs');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Songs');
    }

    public function update(AuthUser $authUser, Songs $songs): bool
    {
        return $authUser->can('Update:Songs');
    }

    public function delete(AuthUser $authUser, Songs $songs): bool
    {
        return $authUser->can('Delete:Songs');
    }

    public function restore(AuthUser $authUser, Songs $songs): bool
    {
        return $authUser->can('Restore:Songs');
    }

    public function forceDelete(AuthUser $authUser, Songs $songs): bool
    {
        return $authUser->can('ForceDelete:Songs');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Songs');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Songs');
    }

    public function replicate(AuthUser $authUser, Songs $songs): bool
    {
        return $authUser->can('Replicate:Songs');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Songs');
    }

}