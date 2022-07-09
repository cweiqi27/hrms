<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $primaryKey = 'leave_id';

    public function employee() 
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
