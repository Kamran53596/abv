<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;
use App\Http\Requests\UserUpdateRequest;

class UsersController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorize('viewAdmin', User::class);

        $users = User::getData($request);

        $roles = Role::get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function view($id): View
    {
        $this->authorize('viewUsers', User::class);

        $user = User::findOrFail($id);

        return view('admin.users.view', compact('user'));
    }

    public function edit($id): View
    {
        $this->authorize('editAdmin', User::class);

        $user = User::findOrFail($id);

        $roles = Role::get();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, $id): RedirectResponse
    {
        $user = User::find($id);

        $user->fill($request->validated());
        
        $user->phone = $request->phone;
        $user->gender = $request->gender;

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
    
            $filename = "{$user->full_name}-{$user->id}-" . $file->extension();
            
            $path = $file->storeAs("users", $filename, 'public');

            $user->photo = $filename;
        }

        if ($request->role && $user->role_name != $request->role) {
            $user->removeRole($user->role_name);
            $user->assignRole($request->role);
        }

        $user->save();

        return back()->with('status', 'user-updated');
    }

    public function create(Request $request): JsonResponse
    {
        $this->authorize('createAdmin', User::class);

        $credentials = \Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'surname' => ['required', 'string', 'min:3', 'max:255'],
            'role' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($credentials->fails()) {
            return response()->json([
                'type'=> 'error', 
                'errors' => $credentials->errors()
            ], 200, [], JSON_UNESCAPED_UNICODE);
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return response()->json([
            'type' => 'success',
            'redirect' => route('backend.admins')
        ]);
    }

    public function deleteUser($id): RedirectResponse
    {
        $this->authorize('deleteAdmin', User::class);

        $user = User::findOrFail($id);
        $user->removeRole($user->role_name);

        $user->delete();

        return redirect()->route('backend.admins');
    }
}
