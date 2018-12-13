<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = product::all();
        $count = product::all()->count();
        $count_all = product::all()->count();
        $out_of_stock = Product::where('stock',0)->count();

          //return $products;

        return view('admin.product.index',compact('products','count','count_all','out_of_stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $this->validate($request, [

          'name' => 'required|unique:products',
          'description' => 'required',
          'price' => 'required',
          'sizes' => 'required',
          'colors' => 'required',

       ]);


        $sizes = $request->sizes;
        $s = explode(',',$sizes);
       $colors = $request->colors;
           $c = explode(',',$colors);

        $product = new product();
        $product->no = product::GenerateProductNo();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->picture = $request->picture;
        $product->picture1 = $request->picture1;
       $product->picture2 = $request->picture2;
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->sizes = $s;
        $product->colors = $c;

        $product->save();



        return back()->withMessage('product updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'sizes' => 'required',
            'colors' => 'required',

        ]);

        $sizes = $request->sizes;
        $s = explode(',',$sizes);
        $colors = $request->colors;
        $c = explode(',',$colors);
        $stock = $request->stock;
        $status = $request->status;



        switch (TRUE) {

            case (isset($stock) && !isset($status)) :

                    $product->update(array_merge($request->except([
                        'status',
                        'sizes',
                        'colors'
                    ]),

                        [
                            'status' => false,
                            'sizes' => $s,
                            'colors' => $c
                        ]));
        break;

            case(isset($status) && !isset($stock) ):

                 $product->update(array_merge($request->except([

                     'stock',
                     'sizes',
                     'colors'
                 ]),

                     [
                         'stock' => false,
                         'sizes' => $s,
                         'colors' => $c
                     ]));

        break;

        case(isset($stock) && isset($status)) :

            $product->update(array_merge($request->except([

                'sizes',
                'colors'
            ]),

                [
                    'sizes' => $s,
                    'colors' => $c
                ]));

        break;

        case(!isset($stock) && !isset($status)) :
            $product->update(array_merge($request->except([
                'status',
                'stock',
                'sizes',
                'colors'
            ]),

                [
                    'status' => false,
                    'stock' => false,
                    'sizes' => $s,
                    'colors' => $c
                ]));

        break;

            default:

        }

        return redirect()->route('product.index')->withMessage('product updated');

        }







    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('message','product deleted');
        return redirect()->back();
    }
}
