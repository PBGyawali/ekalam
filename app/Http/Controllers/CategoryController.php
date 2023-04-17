<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    protected $fields=array();
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all blog categories from DB
         $categories = Category::paginate(10);
        return view('category.categorylist', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.form');
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
            'name' => ['required','unique:categories']
        ]);
         Category::create($request->all());
         return redirect()->back()->with(['message' => 'The category was created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //returns the view with the category
        return view('category.show',['category'=>$category]);
    }

    public function edit(Category $category)
    {
        //returns the edit view with the category
        return view('category.form', ['category' => $category]);
    }


    public function update(Request $request, Category $category)
    {
       $this->validate($request, [
           'name' => ['required',Rule::unique('categories')->ignore($category)]
            ]);
            $category->update($request->all());
            if($request->ajax() || $request->wantsJson())
            {
                return response()->json(['success' => 'The category was updated!']);
            }
           return redirect()->back()->with(['message' => 'The category was updated!']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message', 'The category was deleted!');
    }
}
