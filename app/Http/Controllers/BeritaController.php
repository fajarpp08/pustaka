<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::paginate(6);

        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        $beritas = Berita::all();

        return view('admin.berita.create', compact('beritas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'deskripsi_berita' => 'required',
            'tanggal_berita' => 'required',
            'gambar_berita' => 'nullable',
        ], [
            'judul_berita.required' => 'Judul Berita harus diisi!',
            'deskripsi_berita.required' => 'Deskripsi Berita harus diisi',
            'tanggal_berita.required' => 'Tanggal Berita harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-berita')->withErrors($validator)->withInput();
        }
        $beritas = $validator->valid();

        $beritas = new Berita();
        $beritas->judul_berita = $request->judul_berita;
        $beritas->deskripsi_berita = $request->deskripsi_berita;
        $beritas->tanggal_berita = $request->tanggal_berita;

        if ($request->hasFile('gambar_berita')) {
            $file = $request->file('gambar_berita');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('berita', $fileName, 'public');
            $beritas->gambar_berita = $fileName;
        }
        // dd($beritas);

        $beritas->save();

        return redirect('/data-berita')->with('message', 'Data Berita berhasil ditambahkan!');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $beritas = Berita::find($id);

        return view('admin.berita.edit', compact('beritas'));
    }

    public function update(Request $request, string $id)
    {
        $beritas = Berita::findOrFail($id);

        $validatedData = $request->validate([
            'judul_berita' => 'required',
            'deskripsi_berita' => 'required',
            'tanggal_berita' => 'required',
            'gambar_berita' => 'nullable',
        ], [
            'judul_berita.required' => 'judul berita harus diisi!',
            'deskripsi_berita.required' => 'Deskripsi berita harus diisi',
            'tanggal_berita.required' => 'Tanggal berita harus diisi',
        ]);

        $beritas->judul_berita = $validatedData['judul_berita'];
        $beritas->deskripsi_berita = $validatedData['deskripsi_berita'];
        $beritas->tanggal_berita = $validatedData['tanggal_berita'];

        if ($request->hasFile('gambar_berita')) {
            $file = $request->file('gambar_berita');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('berita', $fileName, 'public');
            $beritas->gambar_berita = $fileName;
        }
        // dd($beritas);
        $beritas->save();

        return redirect('/data-berita')->with('message', 'Data Berita berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Berita::destroy($id);
        return redirect('/data-berita')->with('message', 'Data Berita berhasil dihapus!');
    }
}
