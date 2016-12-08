<?php

namespace App\Policies;

use App\Model\Set;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the set.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Set  $set
     * @return mixed
     */
    public function view(User $user, Set $set)
    {
        //
    }

    /**
     * Determine whether the user can create sets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the set.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Set  $set
     * @return mixed
     */
    public function update(User $user, Set $set)
    {
        if($user->id == 1) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the set.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Set  $set
     * @return mixed
     */
    public function delete(User $user, Set $set)
    {
        //
    }
}
