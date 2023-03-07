<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(5);
        return response()->view('cms.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return response()->view('cms.products.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator= validator($request->all(),[
            'name' =>'required',
            'sku' =>'required',
            'description' =>'required',
            'price' =>'required',
            'cost_price' =>'required',
            'discount_price' =>'required',

        ]);
        if(! $validator->fails()){
            $products= new product();
            $products->name = $request->get('name');
            $products->sku = $request->get('sku');
            $products->description = $request->get('description');
            $products->price = $request->get('price');
            $products->cost_price = $request->get('cost_price');
            $products->discount_price = $request->get('discount_price');
            $products->category_id = $request->get('category_id');

            $isSaved= $products->save();

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
        $products= Product::findOrFail($id);
        $categories= category::all();
        return response()->view('/cms.products.edit', compact('products','categories'));
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

        $validator= validator($request->all(),[
            'name' =>'required',
            'sku' =>'required',
            'description' =>'required',
            'price' =>'required',
            'cost_price' =>'required',
            'discount_price' =>'required',

        ]);
        if(! $validator->fails()){
            $products= Product::findOrFail($id);
            $products->name = $request->get('name');
            $products->sku = $request->get('sku');
            $products->description = $request->get('description');
            $products->price = $request->get('price');
            $products->cost_price = $request->get('cost_price');
            $products->discount_price = $request->get('discount_price');
            $products->category_id = $request->get('category_id');

            $isSaved= $products->save();
            return['redirect'=>route('products.index')];

            if($isSaved){
                 return response()->json(['icon' => 'success' , 'title' => "Updated is Successfully"] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => "Updated is Failed"] , 400);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
        //
    }
}

?>
