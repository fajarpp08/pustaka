<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar semua buku yang ada dalam sistem.
     * Data buku diambil dari database dan ditampilkan pada halaman 'admin.buku.index'.
     */
    public function index()
    {
        $bukus = Buku::all();
        return view('admin.buku.index', compact('bukus'));
    }

    /**
     * Menampilkan form untuk menambahkan buku baru ke dalam sistem.
     * Kategori buku diambil dari database untuk ditampilkan sebagai pilihan.
     */
    public function create()
    {
        $kategoris = Kategori::all();

        return view('admin.buku.create', compact('kategoris'));
    }

    /**
     * Menyimpan data buku baru yang diinputkan oleh pengguna melalui form.
     * Data divalidasi terlebih dahulu sebelum disimpan ke database.
     * Jika terdapat file gambar, file tersebut akan disimpan di penyimpanan lokal.
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
     * Menampilkan form untuk mengedit data buku yang sudah ada.
     * Data buku yang akan diedit diambil berdasarkan ID yang diberikan.
     */
    public function edit(string $id)
    {
        $bukus = Buku::find($id);
        $kategoris = Kategori::all();

        return view('admin.buku.edit', compact('bukus', 'kategoris'));
    }

    /**
     * Memperbarui data buku yang sudah ada berdasarkan input pengguna.
     * Data divalidasi terlebih dahulu sebelum disimpan ke database.
     * Jika terdapat file gambar baru, file tersebut akan menggantikan yang lama.
     */
    public function update(Request $request, string $id)
    {
        $bukus = Buku::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'sinopsis' => 'required',
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
     * Menghapus data buku dari database berdasarkan ID yang diberikan.
     * Setelah dihapus, pengguna akan diarahkan kembali ke halaman daftar buku.
     */
    public function destroy(string $id)
    {
        Buku::destroy($id);
        return redirect('/data-buku')->with('message', 'Data buku berhasil dihapus!');
    }

    /**
     * Fitur pencarian buku di halaman user berdasarkan ketersediaan stok.
     * Hanya buku yang stoknya lebih dari 0 yang akan ditampilkan.
     */
    // fitur search user berdasarkan stok
    public function searchByStok(Request $request)
    {
        $keyword = $request->input('keyword');

        // Query untuk mendapatkan buku yang tersedia berdasarkan stok
        $bukus = Buku::where('stok', '>', 0) // Hanya buku yang stoknya lebih dari 0 yang akan ditampilkan
            ->when($keyword, fn($query) => $query->where('judul', 'like', "%$keyword%")
                ->orWhere('penulis', 'like', "%$keyword%"))
            ->get();

        return view('user.dashboard.buku', compact('bukus', 'keyword'));
    }
}
