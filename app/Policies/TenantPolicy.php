<?php

namespace App\Policies;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TenantPolicy
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

        return $user->hasPermissionTo('list_tenants');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Tenant $tenant)
    {
        //
        return $user->hasPermissionTo('show_tenant') ||    $tenant->owner_id==$user->id;
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
        return $user->hasPermissionTo('create_tenant');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Tenant $tenant)
    {
        //
        return $user->hasPermissionTo('edit_tenant') || $user->id == $tenant->owner_id ;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Tenant $tenant)
    {
        //
        return $user->hasPermissionTo('delete_tenant') || $user->id == $tenant->owner_id ;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Tenant $tenant)
    {
        //
        return $user->hasPermissionTo('restore_tenant') || $user->id == $tenant->owner_id ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Tenant $tenant)
    {
        //
        return $user->hasPermissionTo('force_delete_tenant') || $user->id == $tenant->owner_id ;
    }
}
