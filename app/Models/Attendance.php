<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // Relationships
    protected $primaryKey = "attendance_id";

    protected $fillable = [
        "date",
        "clock_in_time",
        "clock_out_time",
        "staff_id"
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, "staff_id");
    }
}
