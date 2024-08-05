<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::paginate(10);
        
        return view('admin.buku.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();

        return view('admin.buku.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis' => 'required',
            'sinopsis' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar_buku' => 'nullable',
            'stok' => 'required|integer|min:0',
        ], [
            'judul.required' => 'Judul harus diisi!',
            'penulis.required' => 'Penulis harus diisi',
            'sinopsis.required' => 'Sinopsis plat harus diisi!',
            'kategori_id.required' => 'Kategori buku harus diisi!',
            'stok.required' => 'Stok buku harus diisi!',
        ]);

        if ($validator->fails()) {
            return redirect('/data-buku/create')->withErrors($validator)->withInput();
        }
        $bukus = $validator->valid();

        $bukus = new Buku();
        $bukus->judul = $request->judul;
        $bukus->penulis = $request->penulis;
        $bukus->sinopsis = $request->sinopsis;
        $bukus->kategori_id = $request->kategori_id;
        $bukus->stok = $request->stok;

        if ($request->hasFile('gambar_buku')) {
            $file = $request->file('gambar_buku');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('buku', $fileName, 'public');
            $bukus->gambar_buku = $fileName;
        }
        // dd($bukus);

        $bukus->save();

        return redirect('/data-buku')->with('message', 'Data mobil berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bukus = Buku::find($id);
        $kategoris = Kategori::all();

        return view('admin.buku.edit', compact('bukus', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bukus = Buku::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'sinopsis' => 'required',
            // 'kategori_id' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar_buku' => 'nullable',
            'stok' => 'required|integer|min:0',
        ], [
            'judul.required' => 'Judul buku harus diisi!',
            'penulis.required' => 'Penulis harus diisi',
            'sinopsis.required' => 'Sinopsis harus diisi!',
            'kategori_id.required' => 'Kategori buku harus diisi!',
            'stok.required' => 'Stok buku harus diisi!',
        ]);

        $bukus->judul = $validatedData['judul'];
        $bukus->penulis = $validatedData['penulis'];
        $bukus->sinopsis = $validatedData['sinopsis'];
        $bukus->kategori_id = $validatedData['kategori_id'];
        $bukus->stok = $validatedData['stok'];

        if ($request->hasFile('gambar_buku')) {
            $file = $request->file('gambar_buku');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('buku', $fileName, 'public');
            $bukus->gambar_buku = $fileName;
        }

        // dd($bukus);
        $bukus->save();

        return redirect('/data-buku')->with('message', 'Data buku berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Buku::destroy($id);
        return redirect('/data-buku')->with('message', 'Data buku berhasil dihapus!');
    }

    // fitur search admin 
    public function searchByName(Request $request)
    {
        $keyword = $request->input('keyword');

        $bukus = Buku::where(function ($query) use ($keyword) {
            $query->where('judul', 'like', "%$keyword%")
                ->orWhere('penulis', 'like', "%$keyword%");
            // ->orWhere('noplat', 'like', "%$keyword%");
        })->paginate(10);

        return view('admin.buku.index', compact('bukus', 'keyword'));
    }

    // public function searchByStokDate(Request $request)
    // {
    //     $keyword = $request->input('keyword');
    //     $tanggal = \Carbon\Carbon::parse($request->input('tanggal'))->format('Y-m-d');

    //     // Ambil semua buku yang dipinjam pada tanggal yang diinput
    //     $bukuDipinjam = Peminjaman::where('tgl_mulai', '<=', $tanggal)
    //         ->where('tgl_akhir', '>=', $tanggal)
    //         ->select('buku_id', DB::raw('count(*) as jumlah_peminjaman'))
    //         ->groupBy('buku_id')
    //         ->get();

    //     // Filter buku yang stoknya sudah habis pada tanggal tersebut
    //     $bukuTidakTersedia = $bukuDipinjam->filter(fn ($item) => Buku::find($item->buku_id)->stok <= $item->jumlah_peminjaman)
    //         ->pluck('buku_id')->toArray();

    //     // Query untuk mendapatkan buku yang tersedia
    //     $bukus = Buku::whereNotIn('id', $bukuTidakTersedia)
    //         ->where('stok', '>', 0) // Hanya buku yang stoknya lebih dari 0 yang akan ditampilkan
    //         ->when($keyword, fn ($query) => $query->where('judul', 'like', "%$keyword%")
    //             ->orWhere('penulis', 'like', "%$keyword%"))
    //         ->get();

    //     return view('user.dashboard.buku', compact('bukus', 'keyword', 'tanggal'));
    // }

    public function searchByStok(Request $request)
    {
        $keyword = $request->input('keyword');

        // Query untuk mendapatkan buku yang tersedia berdasarkan stok
        $bukus = Buku::where('stok', '>', 0) // Hanya buku yang stoknya lebih dari 0 yang akan ditampilkan
            ->when($keyword, fn ($query) => $query->where('judul', 'like', "%$keyword%")
                ->orWhere('penulis', 'like', "%$keyword%"))
            ->get();

        return view('user.dashboard.buku', compact('bukus', 'keyword'));
    }
}
