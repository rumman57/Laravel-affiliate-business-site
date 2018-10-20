<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SellProduct;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('myadmin.products.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        return view('myadmin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'       => 'required|max:255|min:2',
            'buyprice'        => 'required',
            'sellprice'        => 'required',
            'commision'        => 'required',
            'image'       => 'required|image'
        ]);

        $product = new Product;
        $product->name         = $request->name;
        $product->buyprice        = $request->buyprice;
        $product->sellprice        = $request->sellprice;
        $product->commision        = $request->commision;
     
         if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'uploads/products';
            $image->move($location, $filename);
            $product->image = 'uploads/products/'.$filename;
         }

        $product->save();
        
        Session::flash('adsuccess','The Product Created Successfully');
        return redirect()->route('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('myadmin.products.edit')->withProduct($product);
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
        $this->validate($request,[
            'name'       => 'required|max:255|min:2',
            'buyprice'        => 'required',
            'sellprice'        => 'required',
            'commision'        => 'required',
            'image'       => 'image'
        ]);

        $product = Product::find($id);
        $product->name         = $request->name;
        $product->buyprice        = $request->buyprice;
        $product->sellprice        = $request->sellprice;
        $product->commision        = $request->commision;
     
         if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'uploads/products';
            $image->move($location, $filename);
            $product->image = 'uploads/products/'.$filename;
         }

        $product->save();
        
        Session::flash('adsuccess','The Updated Have Saved Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $sellproduct = SellProduct::where('product_id','=',$id)->get();
        foreach ($sellproduct as $key => $value) {
          $value->delete();
        }
        $product->delete();
        return redirect()->back();
    }
}
