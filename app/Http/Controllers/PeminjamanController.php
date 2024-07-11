<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamans = Peminjaman::paginate(10); // 10 items per page

        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjamans, $id)
    {
        return view('admin.peminjaman.edit', [
            'peminjamans' => Peminjaman::find($id),
            'users' => User::all(),
            'bukus' => Buku::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peminjamans = Peminjaman::findOrFail($id);

        $validatedData = $request->validate([
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'buku_id' => 'required',
            'user_id' => 'required',
            // 'status_kembali' => 'nullable',
        ], [

            'tgl_mulai.required' => 'kolom tanggal harus diisi',
            'tgl_akhir.required' => 'kolom tanggal harus diisi',
            'buku_id.required' => 'kolom buku harus diisi',
            'user_id.required' => 'kolom user harus diisi',
            // 'status_kembali.nullable' => 'status kembali',
        ]);


        $peminjamans->tgl_mulai = $validatedData['tgl_mulai'];
        $peminjamans->tgl_akhir = $validatedData['tgl_akhir'];
        $peminjamans->buku_id = $validatedData['buku_id'];
        $peminjamans->user_id = $validatedData['user_id'];
        // $peminjamans->status_kembali = $validatedData['status_kembali'];

        $peminjamans->save();

        return redirect('/peminjaman')->with('message', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Peminjaman::destroy($id);
        return redirect('/peminjaman')->with('message', 'Data berhasil dihapus');
    }



    // USER 
    public function formPeminjaman($buku_id)
    {
        $users = Auth::user();
        $bukus = Buku::findOrFail($buku_id);

        // Mengambil data tanggal yang sudah dipesan
        $tglPinjam = Peminjaman::where('buku_id', $buku_id)
            ->where(function ($query) {
                $query->where('tgl_akhir', '>=', now())
                    ->orWhere('tgl_mulai', '>=', now());
            })
            ->pluck('tgl_mulai', 'tgl_akhir')
            ->flatten();

        return view('user.transaksi.forms', [
            'bukus' => $bukus,
            'users' => $users->nama,
            'nama' => $users->noanggota,
            'tglPinjam' => $tglPinjam,
        ]);
    }

    public function createPeminjaman(Request $request)
    {
        $request->validate([
            'tgl_mulai' => 'required|date',
            'tgl_akhir' => 'required|date|after:tgl_mulai',
            'buku_id' => 'required|exists:bukus,id',
        ]);

        // Mengambil data user login
        $user_id = Auth::id();

        // Mengambil data mobil 
        $mobils = Buku::findOrFail($request->input('buku_id'));

        // Isi data
        $peminjamans = new Peminjaman();
        $peminjamans->user_id = $user_id;
        $peminjamans->tgl_mulai = $request->tgl_mulai;
        $peminjamans->tgl_akhir = $request->tgl_akhir;
        $peminjamans->buku_id = $request->buku_id;

        // Save data 
        $peminjamans->save();

        return redirect()->route('pinjaman')->with('success', 'Peminjaman buku berhasil dilakukan!');
    }

    public function pinjaman()
    {
        $user = Auth::user();
        // Mengambil data peminjaman dari data user yang login
        $pinjamanUser = $user->peminjamans ?? collect();

        // Mengambil data peminjaman 
        $pinjamanPagination = Peminjaman::paginate(6);

        $pinjamanUser->each(function ($pinjamans) {
            $pinjamans->status_kembali = $pinjamans->pengembalian()->exists();
        });

        // dd($pinjamanUser);
        return view('user.dashboard.peminjaman', compact('pinjamanUser', 'pinjamanPagination'));
    }

    public function kembalikan($peminjamanId)
    {
        // Membuat data $peminjamanId adalah tipe data integer
        $peminjamanId = (int)$peminjamanId;

        // Cek data id peminjaman
        $peminjaman = Peminjaman::find($peminjamanId);

        // validasi jika tidak ada data peminjaman
        if (!$peminjaman) {
            return redirect()->route('pinjaman')->with('error', 'Data peminjaman tidak ditemukan!');
        }

        // Menambahkan data ke tabel pengembalian
        $pengembalian = new Pengembalian([
            // Input data tgl_kembali otomatis sesuai tanggal pada saat dikembalikan 
            'tgl_kembali' => now(),
        ]);

        $peminjaman->pengembalian()->save($pengembalian);
        // dd($peminjaman);
        // Membuat data status_kembali menjadi true = 1
        $peminjaman->status_kembali = true;

        $peminjaman->save();

        return redirect()->route('pinjaman')->with('success', 'Mobil telah dikembalikan.');
    }
}
