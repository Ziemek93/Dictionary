<?php

namespace App\Models;

use App\Models\Definition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Word extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;
    protected $fillable =[
        'name', 'definition_id'
    ];


    public function definition(){
        return $this->belongsTo(Definition::class);
    }


}
