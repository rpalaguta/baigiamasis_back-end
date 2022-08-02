<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = Category::all();

        return $categories;
    }
    
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate(
                [
                'name' => 'required|between:2,100',
                 ]
            );

            Category::create($request->all());

            return 'category created successfully';
        }

        // $firstLevelCategories = Category::where('category_id', null)->get();

        // return view('admin.category.create', compact('firstLevelCategories'));
    }

    public function show(Category $category): View
    {
        return view('admin.category.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        //
    }
}
