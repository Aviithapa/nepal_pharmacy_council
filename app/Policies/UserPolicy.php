<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //

    }

    public function read(User $user)
    {
        return $user->isAdmin()->name === "admin";
    }

    public function create(User $user)
    {
        return $user->isAdmin()->name === "admin";
    }

    public function update(User $user)
    {
        return $user->isAdmin()->name === "admin";
    }

    public function edit(User $user)
    {
        return $user->isAdmin()->name === "admin";
    }

    public function destroy(User $user)
    {
        return $user->isAdmin()->name === "admin";
    }

    public function store(User $user)
    {
        return $user->isAdmin()->name === "admin";
    }
}
