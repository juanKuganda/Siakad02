<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Student extends Model
{
    protected $primaryKey = 'id_student';
    public function majors(): BelongsTo
    {
        return $this->belongsTo(Majors::class, 'majors_id', 'id_major');
    }
    protected $fillable = [
            'name',
            'student_id_number',
            'email',
            'phone_number',
            'birth_date',
            'gender',
            'status',
            'majors_id'
    ];

}
