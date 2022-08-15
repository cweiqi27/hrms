<?php

namespace App\Policies;

use App\Models\Staff;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ClockInPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function clockIn(): bool
    {
        return !session()->has('clock-in') && Auth::user()->role === 'employee';
    }

    public function clockOut(): bool
    {
        return session()->has('clock-in') && Auth::user()->role === 'employee';
    }
}
