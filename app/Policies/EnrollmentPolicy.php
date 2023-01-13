<?php

namespace App\Policies;

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnrollmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        return $user->hasPermissionTo('list_enrollments');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Enrollment $enrollment)
    {
        //
        return $user->hasPermissionTo('show_enrollment');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return $user->hasPermissionTo('create_enrollment');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Enrollment $enrollment)
    {
        //
        return $user->hasPermissionTo('update_enrollment');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Enrollment $enrollment)
    {
        //
        return $user->hasPermissionTo('delete_enrollment');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Enrollment $enrollment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enrollment  $enrollment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Enrollment $enrollment)
    {
        //
    }
}
