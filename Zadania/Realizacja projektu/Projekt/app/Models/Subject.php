<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function profiles1()
    {
        return $this->hasMany(Profile::class, 'subject_extended1_id');
    }

    public function profiles2()
    {
        return $this->hasMany(Profile::class, 'subject_extended2_id');
    }

    public function profiles3()
    {
        return $this->hasMany(Profile::class, 'subject_extended3_id');
    }
}
