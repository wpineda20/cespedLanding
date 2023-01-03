<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customer';

    public $incrementing = true;

    protected $data = ['deleted_at'];

    protected $fillable = [
        'id', 'customer_name', 'direction', 'telephone', 'cellphone', 'email', 'dui', 'nit', 'nrc', 'exempt', 'last_buy', 'credit_limit', 'subsidiary_id', 'created_at', 'updated_at', 'deleted_at', 
    ];

    public $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage)
    {
        return Customer::select('customer.*', 'subsidiary.*', 'customer.id as id')
        ->join('subsidiary', 'customer.subsidiary_id', '=', 'subsidiary.id')

		->where('customer.customer_name', 'like', $search)
		->orWhere('customer.direction', 'like', $search)
		->orWhere('customer.telephone', 'like', $search)
		->orWhere('customer.cellphone', 'like', $search)
		->orWhere('customer.email', 'like', $search)
		->orWhere('customer.dui', 'like', $search)
		->orWhere('subsidiary.subsidiary_name', 'like', $search)

        ->skip($skip)
        ->take($itemsPerPage)
        ->orderBy("customer.$sortBy", $sort)
        ->get();
    }

    public static function counterPagination($search)
    {
        return Customer::select('customer.*', 'subsidiary.*', 'customer.id as id')
        ->join('subsidiary', 'customer.subsidiary_id', '=', 'subsidiary.id')

		->where('customer.customer_name', 'like', $search)
		->orWhere('customer.direction', 'like', $search)
		->orWhere('customer.telephone', 'like', $search)
		->orWhere('customer.cellphone', 'like', $search)
		->orWhere('customer.email', 'like', $search)
		->orWhere('customer.dui', 'like', $search)
		->orWhere('subsidiary.subsidiary_name', 'like', $search)

        ->count();
    }
}
