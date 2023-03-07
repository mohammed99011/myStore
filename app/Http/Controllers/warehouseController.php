<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class warehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::orderBy('id', 'desc')->paginate(5);
        return response()->view('cms.warehouse.index' , compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $validator = validator($request->all(), [

    ]);

    if (!$validator->fails()) {
        $warehouses= new Warehouse();
        $warehouses->name = $request->name;
        $warehouses->warehouse_No = $request->warehouse_No;

        $isSaved = $warehouses->save();
        if ($isSaved) {
            return response()->json(['icon' => 'success' , 'title' => "Created is Successfully"], 200);
        } else {
            return response()->json(['icon' => 'error' , 'title' => "Created is Failed"], 400);
        }
    } else {
        return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()], 400);
    }
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouses = Warehouse::findOrFail($id);
        return response()->view('cms.warehouse.edit', compact('warehouses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [

        ]);

        if (!$validator->fails()) {
            $warehouses=  Warehouse::findOrFail($id);
            $warehouses->name = $request->name;
            $warehouses->warehouse_No = $request->warehouse_No;

            $isSaved = $warehouses->save();
            return['redirect' =>route('warehouses.index')];
            if ($isSaved) {
                return response()->json(['icon' => 'success' , 'title' => "update is Successfully"], 200  );

            }  else {
                return response()->json(['icon' => 'error' , 'title' => "update is Failed"], 400);
            }
        } else {
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouses = Warehouse::destroy($id);
        return response()->json(['icon' =>'success', 'title' => "destroy is Successfully"], 200);
    }
}
