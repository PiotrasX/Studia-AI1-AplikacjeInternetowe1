<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'date_of_submission', 'profile_id', 'total_paid', 'point_score'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
