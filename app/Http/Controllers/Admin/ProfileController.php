<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile.index');
    }

    public function edit(): View
    {
        return view('profile.edit');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'password-updated');
    }

    public function addToken(Request $request)
    {
        $request->user()->update([
            'app_id' => $request->app_id
        ]);
    }
}
