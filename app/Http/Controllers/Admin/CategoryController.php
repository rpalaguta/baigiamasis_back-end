<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response(Category::all(), 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate(
                [
                'name' => 'required|between:2,100',
                ]
            );

            Category::create($request->all());

            return response($request->all(), 200);
        }
    }

    public function show($id)
    {
        $category = Category::find($id);
        return response($category, 200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('put')) {
            $data = $request->validate(
                [
                'name' => 'required|between:2,100',
                'active' => 'required'
                ]
            );
            $category = Category::where('id', $id)->update($data);
            // $category->save();

            return response($category, 200);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return response('category deleted successfully', 200);
    }
}
