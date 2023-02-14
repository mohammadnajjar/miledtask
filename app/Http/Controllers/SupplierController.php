<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::distinct()->pluck('supplier', 'id');
        $wholesalers = Supplier::distinct()->pluck('whole_seller', 'id');
        $steeringTypes = Supplier::distinct()->pluck('steering_type', 'id');
        return view('supplier.index', compact('suppliers', 'wholesalers', 'steeringTypes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function store(Request $request)
    {

            $supplier = $request->input('supplier');
            $wholesaler = $request->input('wholesaler');
            $steeringType = $request->input('steering_type');

        $models = Car::distinct()->pluck('model', 'id');
        $sfxs = Car::distinct()->pluck('SFX', 'id');
        $variants = Car::distinct()->pluck('variant', 'id');
        $colors = Car::distinct()->pluck('color', 'id');
        return view('car.index', compact('supplier','wholesaler','steeringType','models', 'sfxs', 'variants', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function filter(Request $request)
    {
//        return $request;
        $filteredResult = collect();

        $model = $request->input('model');
        $sfx = $request->input('sfx');
        $variant = $request->input('variant');
        $color = $request->input('color');
        $supplier = $request->input('supplier');
        $wholesaler = $request->input('wholesaler');
        $steeringType = $request->input('steeringType');

        $models = Car::all();
        $filteredResult = Car::query()
            ->where('model', $model)
            ->where('sFX', $sfx)
            ->where('variant', $variant)
            ->where('color', $color)
            ->leftJoin('suppliers', function ($join) use ($supplier, $wholesaler, $steeringType) {
                $join->on('cars.supplier_id', '=', 'suppliers.id');
                if ($supplier) {
                    $join->where('suppliers.supplier', $supplier);
                }
                if ($wholesaler) {
                    $join->where('suppliers.whole_seller', $wholesaler);
                }
                if ($steeringType) {
                    $join->where('suppliers.steering_type', $steeringType);
                }
            })
            ->get();

        return response()->json($filteredResult);


    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
