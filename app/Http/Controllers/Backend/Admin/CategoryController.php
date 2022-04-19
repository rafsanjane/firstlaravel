<?php

namespace App\Http\Controllers\Backend\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $category = Category::all();
        return view('backend.pages.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.pages.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request) {

        // validate rules - rules ar in CategoryRequest
        $request->validated();

        // new category store DB
        // image upload
        $fileName = $request->file('categories_icon');
        $ImageName = uniqid(rand() . time()) . '.' . $fileName->getClientOriginalExtension();
        $fileName->move('media/category/', $ImageName);

        Category::create([
            'name'   => $request->category_name,
            'slug'   => str::slug($request->category_name),
            'image'  => $ImageName,
            'status' => $request->status,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category) {

        return view('backend.pages.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category) {

        // validate rules - rules ar in CategoryRequest
        $request->validated();

        // new category store DB
        // image upload
        $fileName = $request->file('categories_icon');
        $ImageName = uniqid(rand() . time()) . '.' . $fileName->getClientOriginalExtension();
        $fileName->move('media/category/', $ImageName);

        $category->update([
            'name'   => $request->category_name,
            'slug'   => str::slug($request->category_name),
            'image'  => $ImageName,
            'status' => $request->status,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        Category::find($id)->delete();
        return back();
    }
}
