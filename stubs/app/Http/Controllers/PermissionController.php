<?php

namespace App\Http\Controllers\Adminify;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function alter(Request $request, Role $role)
    {
        $role->syncPermissions(array_keys($request->except('_token')));

        return redirect()->back()->with('success', 'Changes saved successfully');
    }
}
