<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('home');
    }

    /**
     *
     * Warehouse option
     *
     */
    public function category()
    {
        return view('warehouse.category');
    }

    public function presentation()
    {
        return view('warehouse.presentation');
    }

    public function brand()
    {
        return view('warehouse.brand');
    }

    public function product()
    {
        return view('warehouse.product');
    }

    /**
     *
     * Administration option
     *
     */
    public function countries()
    {
        return view('department.index');
    }

    public function departments()
    {
        return view('department.index');
    }

    public function municipalities()
    {
        return view('department.index');
    }

    public function user()
    {
        return view('administration.user');
    }

    public function role()
    {
        return view('administration.role');
    }
}
