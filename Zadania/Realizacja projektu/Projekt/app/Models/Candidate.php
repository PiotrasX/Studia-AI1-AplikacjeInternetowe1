<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'photo', 'account_balance', 'result_math', 'result_polish_language', 'result_english_language', 'name_fourth_subject', 'result_fourth_subject'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registration()
    {
        return $this->hasOne(Registration::class);
    }
}
