<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();

        return response()->json([
            "status" => 200,
            "message" => "Registros obtenidos correctamente.",
            "setting" => $setting,
            "success" => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = Setting::first();
        $setting->tariff = $request->tariff;
        $setting->save();

        return response()->json([
            "status" => 200,
            "message" => "Registro guardado correctamente.",
            "success" => true,
        ]);
    }
}
