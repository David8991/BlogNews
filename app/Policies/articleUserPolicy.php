<?php

namespace App\Policies;

use App\Models\User;
use App\Models\articleUser;
use Illuminate\Auth\Access\Response;

class articleUserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, articleUser $articleUser): bool
    {
        return $user->id === $articleUser->id_user;
    }

    /**
     * Determine whether the user can create models.
     */
    // public function create(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, articleUser $articleUser): bool
    {
        return $user->id === $articleUser->id_user;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, articleUser $articleUser): bool
    {
        return $user->id === $articleUser->id_user;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, articleUser $articleUser): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, articleUser $articleUser): bool
    // {
    //     //
    // }
    
    public function before(User $user, string $ability): bool|null
    {
        if ($user->id === $user->where('email', "admin@mail.ru")->first()->id) {
            return true;
        }
    
        return null;
    }
}
