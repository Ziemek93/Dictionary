<?php

namespace App\Models;

use App\Models\Word;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Definition extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'description'
    ];


    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function getWords()
    {
        return $this->words()->get();
    }
}
