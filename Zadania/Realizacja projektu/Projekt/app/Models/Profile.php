<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'subject_extended1_id', 'hours_subject_extended1', 'subject_extended2_id',
        'hours_subject_extended2', 'subject_extended3_id', 'hours_subject_extended3',
        'number_of_seats', 'weight_math', 'weight_polish_language', 'weight_english_language',
        'weight_biology', 'weight_chemistry', 'weight_physics', 'weight_geography', 'weight_history',
        'entry_fee', 'open_recruitment', 'image'
    ];

    public function subjectExtended1()
    {
        return $this->belongsTo(Subject::class, 'subject_extended1_id');
    }

    public function subjectExtended2()
    {
        return $this->belongsTo(Subject::class, 'subject_extended2_id');
    }

    public function subjectExtended3()
    {
        return $this->belongsTo(Subject::class, 'subject_extended3_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
