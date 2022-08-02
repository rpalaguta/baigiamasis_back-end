<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return response($users, 200);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate(
                [
                'email' => 'required|email|unique:users',
                'name' => 'required|between:2,100',
                'password' => 'required',
                'role_id' => 'required',
                ]
            );
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            return response($user, 200);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
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
        $user->delete();
        return response('User deleted', 200);
    }
}
