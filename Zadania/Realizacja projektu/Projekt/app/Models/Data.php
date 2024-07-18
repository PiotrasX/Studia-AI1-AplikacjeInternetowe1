<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'gender', 'date_of_birth', 'phone_number', 'street', 'house_number', 'zip_code', 'town', 'father_name', 'mother_name'];

    protected $casts = ['date_of_birth' => 'date'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
