<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = ProductColor::orderBy('id','desc')->paginate(5);
        $products = Product::all();
        return response()->view('cms.color.index' , compact('colors' , 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return response()->view('cms.color.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = validator($request->all() , [
            'title' => 'required' ,
        ]);

        if(! $validator->fails()){
            $colors = new ProductColor();
            $colors->title = $request->get('title');
            $colors->product_id = $request->get('product_id');

            $isSaved = $colors->save();


            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => "Created is Successfully"] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "Created is Failed"] , 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
        $colors = ProductColor::findOrFail($id);
        $products = Product::all();
        return response()->view('cms.color.edit', compact('colors','products'));
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

        $validator = validator($request->all() ,
        [

            'title' => 'required' ,
        ]);

        if( !$validator->fails()){

            $colors = ProductColor::findOrFail($id);
            $colors->title = $request->get('title');
            $colors->product_id = $request->get('product_id');


            $isUpdate= $colors->save();
            return ['redirect'=>route('colors.index')];

            if ($isUpdate) {
            return response()->json([
            'icon'=> 'success',
            'title'=>' Edit is successfully',
            ], 200);
            }
            else{
                return response()->json([
                    'icon' => 'error',
                    'title' => 'Edit is fail',
                ],400);
            }

        }
        else{
            return response()->json([
                'icon'=> 'error',
                'title'=> $validator->getMessageBag()->first(),
            ] , 400);
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
        $colors = ProductColor::destroy($id);
        return response()->json([
            'icon'=>'success',
            'title'=>'deleted is successfully',
        ]);
    }
}
