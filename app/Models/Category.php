<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'category';

    public $incrementing = true;

    protected $data = ['deleted_at'];

    protected $fillable = [
        'id', 'category_name', 'created_at', 'updated_at', 'deleted_at', 
    ];

    public $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage)
    {
        return Category::select('category.*', 'category.id as id')
        
		->where('category.category_name', 'like', $search)

        ->skip($skip)
        ->take($itemsPerPage)
        ->orderBy("category.$sortBy", $sort)
        ->get();
    }

    public static function counterPagination($search)
    {
        return Category::select('category.*', 'category.id as id')
        
		->where('category.category_name', 'like', $search)

        ->count();
    }
}
