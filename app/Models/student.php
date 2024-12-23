<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table ='students';
    protected $primaryKey = 'id';
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'phone',
        'birth_date',
        'enrollment_date',
        'user_id',
        'status'
    ];
}
