<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // ADMIN
    public function dashboardAdmin()
    {
        return view('admin.dashboard.index');
    }
}
