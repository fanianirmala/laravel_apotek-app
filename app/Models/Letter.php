<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    public function lettertype()
    {
        return $this->belongsTo(LetterType::class,'letter_type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'notulis', 'id');
    }

    protected $fillable = [
        'letter_type_id',
        'letter_perihal',
        'recipients',
        'content',
        'attachment',
        'notulis',
    ];
}
