<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $primaryKey = 'id_subject';
    protected $fillable = [
        'name',
        'subject_code',
        'description'
    ];
    protected $table = 'subjects';
}
