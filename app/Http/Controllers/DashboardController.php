<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // ADMIN
    public function dashboardAdmin()
    {
        return view('admin.dashboard.index');
    }

    // USER
    public function dashboardUser()
    {
        $bukus = Buku::all();
        return view('user.dashboard.index', compact('bukus'));
    }
    public function buku()
    {
        $bukus = Buku::all();
        $bukus = Buku::paginate(6);
        return view('user.dashboard.buku', compact('bukus'));
    }
    public function bukuDetail($id)
    {
        $bukus = Buku::find($id);
        $bukusAll = Buku::all();
        return view('user.dashboard.detail', compact('bukus', 'bukusAll'));
    }
    public function account()
    {
        // $users = Auth::user();
        // $mobilsAll = Mobil::all();
        return view(
            'user.dashboard.account'
            // , [
            //     'users' => $users,
            // ]
        );
    }
}
