<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable;

    // Relationships
    protected $table = "staffs";
    protected $primaryKey = "staff_id";

    public function leave()
    {
        return $this->hasOne(Leave::class, "staff_id");
    }

    public function task()
    {
        return $this->hasMany(Task::class, "staff_id");
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, "staff_id");
    }

    public function workHours()
    {
        return $this->hasOne(WorkHours::class, "staff_id");
    }

    // Password reset notification
//    public function sendPasswordResetNotification($token)
//    {
//        $url = "https://localhost:8002/reset-password?token=" . $token;
//
//        $this->notify($url);
//    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "email",
        "password",
        "contact_no",
        "status",
        "salary",
        "role",
        "department",
        "position",
        "level",
        "manager_id"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ["password", "remember_token"];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        "email_verified_at" => "datetime",
    ];
}
