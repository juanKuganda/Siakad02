<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Krs extends Model
{
    protected $primaryKey = 'id_krs';
    protected $table = 'krs';
    protected $fillable = ['student_id', 'subject_id', 'semester', 'academic_year'];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id_student');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subjects::class, 'subject_id', 'id_subject');
    }
}
