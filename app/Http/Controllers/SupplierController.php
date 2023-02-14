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

    public function save(Request $request, $id)
    {
        try {
            // Retrieve the data from the request
            $data = $request->all();

            // Perform validation on the data
            $validatedData = $request->validate([
                'model' => 'required|max:255',
                'sFX' => 'required|max:255',
                'variant' => 'required|max:255',
                'color' => 'required|max:255',
                'supplier' => 'required|max:255',
                'whole_seller' => 'required|max:255',
                'steering_type' => 'required|max:255',
            ]);

            // Save the data to the database
            $supplier = new Supplier();
            $supplier->id = $id;
            $supplier->model = $validatedData['model'];
            $supplier->sFX = $validatedData['sFX'];
            $supplier->variant = $validatedData['variant'];
            $supplier->color = $validatedData['color'];
            $supplier->supplier = $validatedData['supplier'];
            $supplier->whole_seller = $validatedData['whole_seller'];
            $supplier->steering_type = $validatedData['steering_type'];
            $supplier->save();
            // Return a success response
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function add(Request $request)
    {
        try {
// Generate a unique identifier for the new row
            $newId = uniqid();
            // Return the new identifier as a response
            return response()->json(['id' => $newId]);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => $e->getMessage()], 500);
        }

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
