<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    $role = Role::orderBy('created_at', 'DESC')->paginate(10);
    return view('role.index', compact('role'));
}
