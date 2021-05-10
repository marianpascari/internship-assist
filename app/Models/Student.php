<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'professor_id',
        'first_name',
        'last_name',
        'faculty',
        'specialization',
        'cnp'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professor_id', 'id');
    }

    public function request()
    {
        return $this->hasOne(Request::class);
    }
}
