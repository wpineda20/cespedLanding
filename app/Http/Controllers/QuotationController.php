<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Setting;
use Illuminate\Http\Request;
use Encrypt;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemsPerPage = $request->itemsPerPage;
        $skip = 0;

        if (($request->itemsPerPage == -1)) {
            $itemsPerPage =  Coordinator::count();
            $skip = ($request->page - 1) * $request->itemsPerPage;
        }

        $sortBy = (isset($request->sortBy[0])) ? $request->sortBy[0] : 'id';
        $sort = (isset($request->sortDesc[0])) ? "asc" : 'desc';

        $search = (isset($request->search)) ? "%$request->search%" : '%%';

        $quotation = Quotation::allDataSearched($search, $sortBy, $sort, $skip, $itemsPerPage);
        $quotation = Encrypt::encryptObject($quotation, "id");

        $total = Quotation::counterPagination($search);

        return response()->json([
            "status" => 200,
            "message" => "Registros obtenidos correctamente.",
            "quotation" => $quotation,
            "total" => $total,
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
        $quotation = new Quotation;

        $quotation->name = $request->name;
        $quotation->email = $request->email;
        $quotation->phone = $request->phone;
        $quotation->address = $request->address;
        $quotation->field_size = $request->field_size;

        $setting = Setting::first();
        $quotation->amount = number_format($request->field_size * $setting->tariff, 2);

        $quotation->save();

        return response()->json([
            "status" => 200,
            "message" => "Registro creado correctamente.",
            "success" => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Encrypt::decryptArray($request->all(), 'id');

        $quotation = Quotation::where('id', $data['id'])->first();
        $quotation->name = $request->name;
        $quotation->email = $request->email;
        $quotation->phone = $request->phone;
        $quotation->amount = $request->amount;
        $quotation->address = $request->address;
        $quotation->field_size = $request->field_size;


        $quotation->save();

        return response()->json([
            "status" => 200,
            "message" => "Registro modificado correctamente.",
            "success" => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (count($request->selected) > 0) {
            foreach ($request->selected as $item) {
                $id = Encrypt::decryptValue($item['id']);

                Quotation::where('id', $id)->delete();
            }
        } else {
            $id = Encrypt::decryptValue($request->id);

            Quotation::where('id', $id)->delete();
        }

        return response()->json([
            "status" => 200,
            "message" => "Registro eliminado correctamente.",
            "success" => true,
        ]);
    }
}
