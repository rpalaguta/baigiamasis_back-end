<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->orderBy('name', 'ASC')->get();
        return response($users, 200);
    }

    // public function store(Request $request)
    // {
    //     if ($request->isMethod('post')) {
    //         $data = $request->validate(
    //             [
    //             'email' => 'required|email|unique:users',
    //             'name' => 'required|between:2,100',
    //             'password' => 'required',
    //             'role_id' => 'required',
    //             ]
    //         );
    //         $data['password'] = Hash::make($data['password']);
    //         $user = User::create($data);
    //         return response($user, 200);
    //     }
    // }

    public function show($id)
    {
        $user = User::find($id);
        return response($user, 200);
    }

    public function showAllUsers()
    {
        $user = User::all();
        return response($user, 200);
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('put')) {
            $data = $request->validate(
                [
                    'name' => 'required|between:2,100',
                    'role_id' => 'required',
                ]
            );
            $user = User::where('id', $id)->update($data);
            return response($user, 200);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->reviews()->delete();
        $user->services()->delete();
        $user->delete();
        return response('User, its services and reviews were deleted successfully', 200);
    }
}
