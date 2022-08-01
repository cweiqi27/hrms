<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    // Relationships
    protected $primaryKey = "leave_id";

    public function staff()
    {
        return $this->belongsTo(Staff::class, "staff_id");
    }
}
