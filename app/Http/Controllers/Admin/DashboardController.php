<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admins = Admin::where('last_activity', '>', Carbon::now()->subMinutes(5)->getTimestamp())->get();

        return view('admin.dashboard', compact('admins'));
    }
}
