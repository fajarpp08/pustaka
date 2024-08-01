<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Buku;
use App\Models\Galeri;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // ADMIN
    public function dashboardAdmin()
    {
        $bukuData = Buku::take(6)->get();
        return view(
            'admin.dashboard.index',
            [
                'bukus' => Buku::all(),
                'peminjamans' => Peminjaman::all(),
                'pengembalians' => Pengembalian::all(),
                'users' => User::all(),
                'bukuData' => $bukuData
            ]
        );
    }

    // USER
    public function dashboardUser()
    {
        $bukus = Buku::all();
        $pengumumans = Pengumuman::take(6)->get();
        $galeris = Galeri::take(6)->get();
        return view('user.dashboard.index', compact('bukus', 'galeris','pengumumans'));
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
    public function berita()
    {
        // $beritas = Berita::all();
        $pengumumans = Pengumuman::all();
        return view('user.dashboard.berita', compact('pengumumans'));
    }
}
