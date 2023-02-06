<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'quotation';

    public $incrementing = true;

    protected $data = ['deleted_at'];

    protected $fillable = [
        'id', 'name', 'email', 'phone', 'amount', 'address', 'field_size', 'created_at', 'updated_at', 'deleted_at',
    ];

    public $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage)
    {
        return Quotation::select('quotation.*', 'quotation.id as id')

            ->where('quotation.name', 'like', $search)
            ->orWhere('quotation.email', 'like', $search)
            ->orWhere('quotation.phone', 'like', $search)
            ->orWhere('quotation.amount', 'like', $search)

            ->skip($skip)
            ->take($itemsPerPage)
            ->orderBy("quotation.$sortBy", $sort)
            ->get();
    }

    public static function counterPagination($search)
    {
        return Quotation::select('quotation.*', 'quotation.id as id')

            ->where('quotation.name', 'like', $search)
            ->orWhere('quotation.email', 'like', $search)
            ->orWhere('quotation.phone', 'like', $search)
            ->orWhere('quotation.amount', 'like', $search)

            ->count();
    }
}
