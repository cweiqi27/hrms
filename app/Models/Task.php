<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Relationships
    protected $primaryKey = "task_id";

    protected $fillable = [
        'task_name',
        'task_status',
        'task_assign_date',
        'task_start_date',
        'task_end_date',
        'staff_id'
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, "staff_id");
    }
}
