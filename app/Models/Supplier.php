<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'supplier';

    public $incrementing = true;

    protected $data = ['deleted_at'];

    protected $fillable = [
        'id', 'nit', 'nrc', 'supplier_name', 'supplier_phone', 'direction', 'salesman_name', 'salesman_phone_number', 'created_at', 'updated_at', 'deleted_at', 
    ];

    public $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage)
    {
        return Supplier::select('supplier.*', 'supplier.id as id')
        
		->where('supplier.nit', 'like', $search)
		->orWhere('supplier.nrc', 'like', $search)
		->orWhere('supplier.supplier_name', 'like', $search)
		->orWhere('supplier.supplier_phone', 'like', $search)
		->orWhere('supplier.direction', 'like', $search)
		->orWhere('supplier.salesman_name', 'like', $search)
		->orWhere('supplier.salesman_phone_number', 'like', $search)

        ->skip($skip)
        ->take($itemsPerPage)
        ->orderBy("supplier.$sortBy", $sort)
        ->get();
    }

    public static function counterPagination($search)
    {
        return Supplier::select('supplier.*', 'supplier.id as id')
        
		->where('supplier.nit', 'like', $search)
		->orWhere('supplier.nrc', 'like', $search)
		->orWhere('supplier.supplier_name', 'like', $search)
		->orWhere('supplier.supplier_phone', 'like', $search)
		->orWhere('supplier.direction', 'like', $search)
		->orWhere('supplier.salesman_name', 'like', $search)
		->orWhere('supplier.salesman_phone_number', 'like', $search)

        ->count();
    }
}
