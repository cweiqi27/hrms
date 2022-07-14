<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $primaryKey = 'staff_id';

    public function leave() 
    {
        return $this->hasOne(Leave::class, 'staff_id');
    }
}
