<?php

namespace App\Http\Controllers;
use App\Http\Requests\Category\UpdatecategoryRequest;
use App\Http\Requests\Category\CreatecategoryRequest;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Blog.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function list()
    {
        return view('Blog.categories.list')->with('category', Category::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatecategoryRequest $request)
    {
        Category::create([
            'category' => $request->category
          ]);

          session()->flash('success', 'category created successfully.');

          return redirect(route('category.list'));
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
    public function edit(Category $category)
    {
        return view('Blog.categories.index')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, Category $category)
    {
        $category->update([
            'category' => $request->category
          ]);

          session()->flash('success', 'category updated successfully.');

          return redirect(route('category.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // if ($category->leaders-> count() > 0) {
        //     session()->flash('error', 'category cannot be deleted because it has some leaders.');

        //     return redirect()->back();
        //   }

        $category->delete();

        session()->flash('success', 'category deleted successfully.');

        return redirect(route('category.list'));
    }
}
