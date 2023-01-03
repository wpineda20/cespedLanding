<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subsidiary';

    public $incrementing = true;

    protected $data = ['deleted_at'];

    protected $fillable = [
        'id', 'municipalities_id', 'subsidiary_name', 'nrc', 'nit', 'direction', 'giro', 'number_phone', 'state',
    ];

    public $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $timestamps = true;

    public static function allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage)
    {
        return Subsidiary::select('subsidiary.id as id', 'subsidiary.*'/*, 'municipalities.*'*/)
        // ->join('municipalities', 'subsidiary.municipalities_id', '=', 'municipalities.id')

        ->where('subsidiary.subsidiary_name', 'like', $search)
        ->orWhere('subsidiary.nrc', 'like', $search)
        ->orWhere('subsidiary.nit', 'like', $search)
        ->orWhere('subsidiary.direction', 'like', $search)
        ->orWhere('subsidiary.number_phone', 'like', $search)

        // ->skip($skip)
        // ->take($itemsPerPage)
        // ->orderBy("subsidiary.".$sortBy, $sort)
        ->get();
    }

    public static function counterPagination($search)
    {
        return Subsidiary::select('subsidiary.*'/*, 'municipalities.*'*/, 'subsidiary.id as id')
        // ->join('municipalities', 'subsidiary.municipalities_id', '=', 'municipalities.id')

        ->where('subsidiary.subsidiary_name', 'like', $search)
        ->orWhere('subsidiary.nrc', 'like', $search)
        ->orWhere('subsidiary.nit', 'like', $search)
        ->orWhere('subsidiary.direction', 'like', $search)
        ->orWhere('subsidiary.number_phone', 'like', $search)

        ->count();
    }
}
