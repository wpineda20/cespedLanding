<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'setting';

    public $incrementing = true;


    protected $fillable = [
        'id', 'tariff',
    ];

    public $timestamps = false;
}
