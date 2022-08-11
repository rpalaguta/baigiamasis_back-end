<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::with('category', 'author', 'reviews')->orderBy('created_at', 'DESC')->get();
        return response($service, 200);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                'name' => 'required|between:5,100',
                'author_id' => 'required',
                'category_id' => 'required',
                'description' => 'required|between:10,255',
                ]
            );
            $service = Service::create($data);
            return response($service, 200);
        }
    }

    public function show($id)
    {
        $service = Service::with('category', 'author', 'reviews')->find($id);
        return response($service, 200);
    }

    public function showInCategory($id)
    {
        $services = Service::with('author', 'category')->where('category_id', $id)->get();
        return response($services, 200);
    }

    public function showAllFromUser($id)
    {
        $services = Service::with('author', 'category')->where('author_id', $id)->get();
        return response($services, 200);
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('put')) {
            $data = $request->validate(
                [
                    'name' => 'required|between:2,100',
                    'category_id' => 'required',
                    'description' => 'required',
                ]
            );
            $service = Service::where('id', $id)->update($data);
            return response($service, 200);
        }
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return response('Service deleted', 200);
    }
}
