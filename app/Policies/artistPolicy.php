<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Artist;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtistPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Artist');
    }

    public function view(AuthUser $authUser, Artist $artist): bool
    {
        return $authUser->can('View:Artist');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Artist');
    }

    public function update(AuthUser $authUser, Artist $artist): bool
    {
        return $authUser->can('Update:Artist');
    }

    public function delete(AuthUser $authUser, Artist $artist): bool
    {
        return $authUser->can('Delete:Artist');
    }

    public function restore(AuthUser $authUser, Artist $artist): bool
    {
        return $authUser->can('Restore:Artist');
    }

    public function forceDelete(AuthUser $authUser, Artist $artist): bool
    {
        return $authUser->can('ForceDelete:Artist');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Artist');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Artist');
    }

    public function replicate(AuthUser $authUser, Artist $artist): bool
    {
        return $authUser->can('Replicate:Artist');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Artist');
    }

}