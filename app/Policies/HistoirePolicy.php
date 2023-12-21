<?php

namespace App\Policies;

use App\Models\Histoire;
use App\Models\User;

class HistoirePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct() {
        //
    }

    function update(User $user, Histoire $histoire) {
        return $user->id === $histoire->user_id;
    }

    function delete(User $user, Histoire $histoire) {
        return $user->id === $histoire->user_id;
    }

    function create(User $user) {
        return true;
    }
}
