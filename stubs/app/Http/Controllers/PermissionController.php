<?php

namespace App\Http\Controllers\Admin\Adminify;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionController extends Controller
{
    public function alter(Request $request, Role $role)
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role->syncPermissions(array_keys($request->except('_token')));

        return redirect()->back()->with('success', 'adminify.permissions_alter');
    }
}
