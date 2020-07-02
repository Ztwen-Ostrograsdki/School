<?php

namespace App\Policies;

use App\Models\Classe;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any classes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the classe.
     *
     * @param  \App\User  $user
     * @param  \App\Classe  $classe
     * @return mixed
     */
    public function view(User $user, Classe $classe)
    {
        // return auth()->user()->id === 1; 
    }

    /**
     * Determine whether the user can create classes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the classe.
     *
     * @param  \App\User  $user
     * @param  \App\Classe  $classe
     * @return mixed
     */
    public function update(User $user, Classe $classe)
    {
        //
    }

    /**
     * Determine whether the user can delete the classe.
     *
     * @param  \App\User  $user
     * @param  \App\Classe  $classe
     * @return mixed
     */
    public function delete(User $user, Classe $classe)
    {
        //
    }

    /**
     * Determine whether the user can restore the classe.
     *
     * @param  \App\User  $user
     * @param  \App\Classe  $classe
     * @return mixed
     */
    public function restore(User $user, Classe $classe)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the classe.
     *
     * @param  \App\User  $user
     * @param  \App\Classe  $classe
     * @return mixed
     */
    public function forceDelete(User $user, Classe $classe)
    {
        //
    }




}
