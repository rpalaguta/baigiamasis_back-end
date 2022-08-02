<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRoleRequest;
use App\Http\Requests\UpdateUserRoleRequest;
use App\Models\UserRole;

class UserRoleController extends Controller
{
    public function index()
    {
        return response(UserRole::all(), 200);
    }

    public function create()
    {
        //
    }

    public function store(StoreUserRoleRequest $request)
    {
        //
    }

    public function show(UserRole $userRole)
    {
        //
    }

    public function edit(UserRole $userRole)
    {
        //
    }

    public function update(UpdateUserRoleRequest $request, UserRole $userRole)
    {
        //
    }

    public function destroy(UserRole $userRole)
    {
        //
    }
}
