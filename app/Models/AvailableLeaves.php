<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableLeaves extends Model
{
    use HasFactory;

    // Relationships
    protected $table = "available_leaves";
    protected $primaryKey = "available_leaves_id";

    protected $fillable = [
        "available_annual_leaves",
        "available_medical_leaves",
        "available_maternity_leaves",
        "staff_id"
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class, "staff_id");
    }
}
