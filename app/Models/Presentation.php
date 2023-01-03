<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'presentation';

    public $incrementing = true;

    protected $data = ['deleted_at'];

    protected $fillable = [
        'id', 'presentation_name', 'created_at', 'updated_at', 'deleted_at', 
    ];

    public $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage)
    {
        return Presentation::select('presentation.*', 'presentation.id as id')
        
		->where('presentation.presentation_name', 'like', $search)

        ->skip($skip)
        ->take($itemsPerPage)
        ->orderBy("presentation.$sortBy", $sort)
        ->get();
    }

    public static function counterPagination($search)
    {
        return Presentation::select('presentation.*', 'presentation.id as id')
        
		->where('presentation.presentation_name', 'like', $search)

        ->count();
    }
}
