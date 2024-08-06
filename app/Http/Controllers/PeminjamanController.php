<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
// use Barryvdh\DomPDF\Facade\Pdf;
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
            'bukus' => Buku::all(),
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
        ], [

            'tgl_mulai.required' => 'kolom tanggal harus diisi',
            'tgl_akhir.required' => 'kolom tanggal harus diisi',
            'buku_id.required' => 'kolom buku harus diisi',
            'user_id.required' => 'kolom user harus diisi',
        ]);
        // dd($peminjamans);
        $peminjamans->tgl_mulai = $validatedData['tgl_mulai'];
        $peminjamans->tgl_akhir = $validatedData['tgl_akhir'];
        $peminjamans->buku_id = $validatedData['buku_id'];
        $peminjamans->user_id = $validatedData['user_id'];

        $peminjamans->save();

        return redirect('/data-peminjaman')->with('message', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Peminjaman::destroy($id);
        return redirect('/data-peminjaman')->with('message', 'Data berhasil dihapus');
    }



    // USER 
    public function formPeminjaman($buku_id)
    {
        $users = Auth::user();
        $bukus = Buku::findOrFail($buku_id);

        if ($bukus->stok <= 0) {
            return redirect()->back()->with('error', 'Maaf, stok buku sedang kosong!');
        }

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
        try {
            // Mengambil data user login
            $user_id = Auth::id();

            // Mengambil data buku 
            $bukus = Buku::findOrFail($request->input('buku_id'));

            // Isi data
            $peminjamans = new Peminjaman();
            $peminjamans->user_id = $user_id;
            $peminjamans->tgl_mulai = $request->tgl_mulai;
            $peminjamans->tgl_akhir = $request->tgl_akhir;
            $peminjamans->buku_id = $request->buku_id;

            // Save data 
            $peminjamans->save();

            // pengurangan stok
            $bukus->decrement('stok');

            return redirect()->route('pinjaman')->with('success', 'Peminjaman buku berhasil dilakukan!');
        } catch (\Exception $err) {
            // Menyimpan pesan error ke dalam session
            return redirect()->route('pinjaman')->with('error', 'Peminjaman buku gagal dilakukan: ' . $err->getMessage());
        }
    }

    public function pinjaman()
    {
        $user = Auth::user();
        // Mengambil semua peminjaman user yang sedang login
        $allPinjamans = $user->peminjamans;

        // Memisahkan peminjaman yang sedang dalam proses dan yang sudah selesai
        $ongoingPinjamans = $allPinjamans->where('status_kembali', false);
        $completedPinjamans = $allPinjamans;

        // dd($completedPinjamans);
        return view('user.dashboard.peminjaman', compact('ongoingPinjamans', 'completedPinjamans'));
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

        // Membuat data status_kembali menjadi true = 1
        $peminjaman->status_kembali = true;
        $peminjaman->save();
        // dd($peminjaman);
        $peminjaman->pengembalian()->save($pengembalian);


        // Menambah stok buku
        $buku = Buku::find($peminjaman->buku_id);
        $buku->stok += 1;
        $buku->save();

        return redirect()->route('pinjaman')->with('success', 'Buku telah dikembalikan.');
    }

    // laporan 
    public function laporan()
    {
        $peminjamans = Peminjaman::paginate(10);

        return view('admin.peminjaman.laporan', compact('peminjamans'));
    }
    public function cetakLaporan(Request $request)
    {
        $tanggalMulai = Carbon::parse($request->input('tgl_mulai'));
        $tanggalAkhir = Carbon::parse($request->input('tgl_akhir'))->endOfDay();

        $peminjamans = Peminjaman::whereBetween('created_at', [$tanggalMulai, $tanggalAkhir])->get();
        return view('admin.peminjaman.laporanpdf', compact('peminjamans'));
    }
}
