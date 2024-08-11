<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();

        return view('admin.galeri.index', compact('galeris'));
    }
    public function create()
    {
        $galeris = Galeri::all();

        return view('admin.galeri.create', compact('galeris'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_galeri' => 'required',
            'deskripsi_galeri' => 'required',
            'gambar_galeri' => 'required',
        ], [
            'judul_galeri.required' => 'Judul Galeri harus diisi!',
            'deskripsi_galeri.required' => 'Deskripsi Galeri harus diisi',
            'gambar_galeri.required' => 'Gambar harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-galeri')->withErrors($validator)->withInput();
        }
        $galeris = $validator->valid();

        $galeris = new Galeri();
        $galeris->judul_galeri = $request->judul_galeri;
        $galeris->deskripsi_galeri = $request->deskripsi_galeri;

        if ($request->hasFile('gambar_galeri')) {
            $file = $request->file('gambar_galeri');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('galeri', $fileName, 'public');
            $galeris->gambar_galeri = $fileName;
        }
        // dd($galeris);

        $galeris->save();

        return redirect('/data-galeri')->with('message', 'Data Galeri berhasil ditambahkan!');
    }
    public function edit(string $id)
    {
        $galeris = Galeri::find($id);

        return view('admin.galeri.edit', compact('galeris'));
    }

    public function update(Request $request, string $id)
    {
        $galeris = Galeri::findOrFail($id);

        $validatedData = $request->validate([
            'judul_galeri' => 'required',
            'deskripsi_galeri' => 'required',
            'gambar_galeri' => 'nullable',
        ], [
            'judul_galeri.required' => 'judul Galeri harus diisi!',
            'deskripsi_galeri.required' => 'Deskripsi Galeri harus diisi',
        ]);

        $galeris->judul_galeri = $validatedData['judul_galeri'];
        $galeris->deskripsi_galeri = $validatedData['deskripsi_galeri'];

        if ($request->hasFile('gambar_galeri')) {
            $file = $request->file('gambar_galeri');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('galeri', $fileName, 'public');
            $galeris->gambar_galeri = $fileName;
        }
        $galeris->save();

        return redirect('/data-galeri')->with('message', 'Data Galeri berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Galeri::destroy($id);
        return redirect('/data-galeri')->with('message', 'Data Galeri berhasil dihapus!');
    }
}
