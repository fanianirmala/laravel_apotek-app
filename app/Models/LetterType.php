<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterType extends Model
{
    use HasFactory;

    public function letter()
    {
        return $this->belongsTo(LetterType::class);
    }

    public function lettertype()
    {
        return $this->hasMany(Letter::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'letter_code',
        'name_type',
    ];
}
