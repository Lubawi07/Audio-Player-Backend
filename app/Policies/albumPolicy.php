<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Album;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlbumPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Album');
    }

    public function view(AuthUser $authUser, Album $album): bool
    {
        return $authUser->can('View:Album');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Album');
    }

    public function update(AuthUser $authUser, Album $album): bool
    {
        return $authUser->can('Update:Album');
    }

    public function delete(AuthUser $authUser, Album $album): bool
    {
        return $authUser->can('Delete:Album');
    }

    public function restore(AuthUser $authUser, Album $album): bool
    {
        return $authUser->can('Restore:Album');
    }

    public function forceDelete(AuthUser $authUser, Album $album): bool
    {
        return $authUser->can('ForceDelete:Album');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Album');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Album');
    }

    public function replicate(AuthUser $authUser, Album $album): bool
    {
        return $authUser->can('Replicate:Album');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Album');
    }

}