<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Limite extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'limites';

    protected $fillable = [
        'cifras',
        'valor'
    ];
}
