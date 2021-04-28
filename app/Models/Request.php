<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'title',
        'status'
    ];

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}
