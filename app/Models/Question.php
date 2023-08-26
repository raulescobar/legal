<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'category',
        'criticality',
        'genere',
        'yes',
        'no',
        'relationship',
        'additional'
    ];

    public function response(){
        return $this->hasMany(Response::class);
    }
}
