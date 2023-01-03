<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product';

    public $incrementing = true;

    protected $data = ['deleted_at'];

    protected $fillable = [
        'id', 'bar_code', 'product_name', 'description', 'supplier_id', 'category_id', 'presentation_id', 'brand_id', 'unit_per_presentation', 'iva', 'cesc', 'service', 'serie', 'exempt', 'product_model', 'created_at', 'updated_at', 'deleted_at', 
    ];

    public $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage)
    {
        return Product::select('product.*', 'supplier.*', 'category.*', 'presentation.*', 'brand.*', 'product.id as id')
        ->join('supplier', 'product.supplier_id', '=', 'supplier.id')
->join('category', 'product.category_id', '=', 'category.id')
->join('presentation', 'product.presentation_id', '=', 'presentation.id')
->join('brand', 'product.brand_id', '=', 'brand.id')

		->where('product.product_name', 'like', $search)
		->orWhere('product.description', 'like', $search)
		->orWhere('product.unit_per_presentation', 'like', $search)
		->orWhere('product.service', 'like', $search)
		->orWhere('product.product_model', 'like', $search)
		->orWhere('supplier.supplier_name', 'like', $search)

        ->skip($skip)
        ->take($itemsPerPage)
        ->orderBy("product.$sortBy", $sort)
        ->get();
    }

    public static function counterPagination($search)
    {
        return Product::select('product.*', 'supplier.*', 'category.*', 'presentation.*', 'brand.*', 'product.id as id')
        ->join('supplier', 'product.supplier_id', '=', 'supplier.id')
->join('category', 'product.category_id', '=', 'category.id')
->join('presentation', 'product.presentation_id', '=', 'presentation.id')
->join('brand', 'product.brand_id', '=', 'brand.id')

		->where('product.product_name', 'like', $search)
		->orWhere('product.description', 'like', $search)
		->orWhere('product.unit_per_presentation', 'like', $search)
		->orWhere('product.service', 'like', $search)
		->orWhere('product.product_model', 'like', $search)
		->orWhere('supplier.supplier_name', 'like', $search)

        ->count();
    }
}
