<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHours extends Model
{
    use HasFactory;

    protected $primaryKey = "work_hours_id";

    protected $fillable = [
        'monthly_work_hours',
        'yearly_work_hours',
        'accumulative_work_hours',
        'staff_id'
    ];

    // Relationships
    public function staff()
    {
        return $this->hasOne(Staff::class, "staff_id");
    }
}
