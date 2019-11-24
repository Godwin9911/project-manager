<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function showAdminDashboard(Request $request)
    {
        return view('admin-dashboard');
    }
}
