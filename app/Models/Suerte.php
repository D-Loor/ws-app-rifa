<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suerte extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'suertes';

    protected $fillable = [
        'numero',
        'fecha',
    ];
}
