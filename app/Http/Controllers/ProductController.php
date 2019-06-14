<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['show', 'index']]);
        $this->middleware('admin', ['except' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('products.create', compact('categories')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $this->clean_numbers($request->price)*100;
        if ($request->old_price) {
         $product->old_price = $this->clean_numbers($request->old_price)*100;
        }
        $product->url = str_slug($request->name);
        $product->description = $request->description;
        $product->category_id = $request->category;

        if ($request->hasFile('picture')) {
             //get unique name for file
            $picName = 'FSH'.uniqid().time().'.'.$request->picture->getClientOriginalExtension();
             //upload the file
            $request->picture->move(public_path().'/uploads/', $picName);
             //save path and name in database
            $product->picture = 'uploads/'.$picName;
        }
        $product->save();
        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $product = Product::where('url',$url)->first();
        if (!$product) {
            abort(404);
        }
        //return view('products.show')->with(['product'=>$product]);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::findOrFail($id);
       $categories = Category::orderBy('name')->get();
       return view('products.edit', compact('product', 'categories'));
    }

     public function delete($id)
    {
       $product = Product::findOrFail($id);
       return view('products.delete', compact('product'));
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
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $this->clean_numbers($request->price)*100;
        $product->old_price = $this->clean_numbers($request->old_price)*100;
       // $product->url = str_slug($request->url);
        $product->description = $request->description;
        $product->category_id = $request->category;
        if ($request->hasFile('picture')) {
            //get unique name for file
            $picName ='FSH'.uniqid().time().'.'.$request->picture->getClientOriginalExtension();
            //upload the file
            $request->picture->move(public_path().'/uploads/', $picName);
            //save path and save in database
            $product->picture ='uploads/'.$picName;
        }
        $product->save();
        return redirect('product/'.$product->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/');
    }
}
