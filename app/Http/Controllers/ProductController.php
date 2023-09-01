<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=product::all();      
        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        $data=[];
        $data['id']=$request->id;
        $data['designation']=$request->designation;
        $data['stock']=$request->stock;

        product::insert($data);
        return redirect()->route('product.index');
        /*
         $Products = new Products();
        $Products->id = $request->input('id');
        $Products->designation = $request->input('designation');
        $Products->save();
        return redirect()->route('stocks')->with('success', 'Stock ajouté avec succès');*/
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('product.edit',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $products,$type,$stock,$id  )
    {
        
        $product = product::find($id);
        if ($type == 'achat') {
            $product->stock += $stock;
        } elseif ($type == 'vente') {
            $product->stock -= $stock;
        }
        $product->save();
       /* $product = Products::find($request->input('id')); 
        $product->stock += ($request->input('type') == 'achat') ? $request->input('stock') : -$request->input('stockabrar'); 
        $product->save();*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
       return redirect()->route('product.index');
    }
}
