<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Models\Role;
use App\Models\Admin;

class RolesController extends Controller
{
    public function index($id = null): View
    {
        $this->authorize('viewRole', Admin::class);

        if (!$id) {
            $roles = Role::where('name' , '!=', 'super-admin')->get();

            return view('admin.roles', compact('roles', 'id'));
        } else {
            $roles = Role::where('name' , '!=', 'super-admin')->get();

            $role = Role::findOrFail($id);

            return view('admin.roles', compact('roles', 'role', 'id'));
        }
    }

    public function create(Request $request)
    {
        $this->authorize('createRole', Admin::class);

        Role::create([
            'name' => $request->name,
            'color' => $request->roleColor
        ]);

        return back();
    }

    public function update(Request $request, $id): JsonResponse
    {
        $this->authorize('editRole', Admin::class);

        $role = Role::findOrFail($id);

        $role->syncPermissions($request->permissions);

        return response()->json([
            'type' => 'success',
            'redirect' => route('backend.roles', ['id' => $id])
        ]);
    }

    public function removeRole($id)
    {
        $this->authorize('deleteRole', Admin::class);

        $admin = Admin::findOrFail($id);

        $admin->removeRole($admin->role_name);

        return back();
    }

    public function delete($id)
    {
        $this->authorize('deleteRole', Admin::class);

        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('backend.roles');
    }
}
