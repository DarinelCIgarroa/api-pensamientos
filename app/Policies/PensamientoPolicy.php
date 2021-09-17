<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pensamiento;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class PensamientoPolicy
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
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pensamiento  $pensamiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pensamiento $pensamiento)
    {
        //
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
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pensamiento  $pensamiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Pensamiento $pensamiento)
    {
        return $user->id === $pensamiento->user_id
        ? Response::allow()
        : Response::deny('No tienes permisos para editar este pensamiento');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pensamiento  $pensamiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Pensamiento $pensamiento)
    {
        return $user->id === $pensamiento->user_id
        ? Response::allow()
        : Response::deny('No tienes permisos para eliminar este pensamiento');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pensamiento  $pensamiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Pensamiento $pensamiento)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pensamiento  $pensamiento
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Pensamiento $pensamiento)
    {
        //
    }
}
