<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
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
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategory $request)
    {
        // $request->validate([
        //     'name' => 'required|min:2|max:200|unique:categories',
        //     'picture' => 'required'
        // ]);

        $category = new Category();
        $category->name = $request->name;
        $category->url = str_slug($request->name);

        if ($request->hasFile('picture')) {
            //get unique name for file
            $picName = 'FSH'.uniqid().time().'.'.$request->picture->getClientOriginalExtension();
            //upload the file
            $request->picture->move(public_path().'/uploads/', $picName);
            //save path and name in database
            $category->picture = 'uploads/'.$picName;
        }
        $category->save();
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
        $category = Category::where('url',$url)->first();
        if (!$category) {
            abort(404);
        }
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $category = Category::where('id',$id)->first();
        //if (!$category) {
        //     abort(404);
        //  }
        //or
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));

    }

     public function delete($id)
    {
        
        $category = Category::findOrFail($id);
        return view('categories.delete', compact('category'));

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
        $category = Category::findOrFail($id);
        $category->name = $request->name;
         if ($request->hasFile('picture')) {
            //get unique name for file
            $picName = 'FSH'.uniqid().time().'.'.$request->picture->getClientOriginalExtension();
            //upload the file
            $request->picture->move(public_path().'/uploads/', $picName);
            //save path and name in database
            $category->picture = 'uploads/'.$picName;
        }
        $category->save();
        return redirect('category/'.$category->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/');
    }
}
