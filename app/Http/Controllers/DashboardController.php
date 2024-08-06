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
use Illuminate\Support\Facades\Auth;

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
        $galeris = Galeri::all();
        $galeriFooter = Galeri::take(6)->latest()->get();
        // dd($galeris);

        $user = Auth::user();
        $books = Peminjaman::leftJoin('bukus', 'peminjamans.buku_id', 'bukus.id')->where('user_id', $user->id)->get();
        // dd($books);
        return view('user.dashboard.index', compact('bukus', 'galeris', 'galeriFooter', 'pengumumans'));
    }
    public function buku()
    {
        $bukus = Buku::all();
        // $bukus = Buku::where('slug', $slug)->firstOrFail();
        return view('user.dashboard.buku', compact('bukus'));
    }
    public function bukuDetail($slug = null)
    {
        // $bukus = Buku::find($id);
        $bukus = Buku::where('slug', $slug)->firstOrFail();

        // dd($bukus);
        $bukusAll = Buku::all();
        return view('user.dashboard.detail', [
            'bukusAll' => $bukusAll,
            'bukus' => $bukus,
        ]);
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
    public function informasi()
    {
        // $beritas = Berita::all();
        $pengumumans = Pengumuman::all();
        $galeris = Galeri::all();
        return view('user.dashboard.informasi', compact('pengumumans', 'galeris'));
    }
    public function pengumumanDetail($slug)
    {
        $pengumumans = Pengumuman::where('slug', $slug)->firstOrFail();
        // dd($pengumumans);
        // $pengumumansAll = Pengumuman::where('id', '!=', $pengumumans->id)->get();
        return view('user.dashboard.detailpengumuman', compact('pengumumans'));
    }

    public function getUserBooks()
    {
        $user = Auth::user();
        $books = Buku::where('user_id', $user->id)->get();

        return response()->json($books);
    }
    // public function footer()
    // {
    //     $galeriFooter = Galeri::take(6)->latest()->get();
    //     dd($galeriFooter);

    //     return view('user.layout.main', [
    //         'galeriFooter' => $galeriFooter
    //     ]);
    // }
}
