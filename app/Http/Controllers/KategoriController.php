<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::paginate(10);

        return view('admin.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Kategori harus diisi!',
        ]);

        if ($validator->fails()) {
            return redirect('/data-kategori/create')->withErrors($validator)->withInput();
        }
        $kategoris = $validator->valid();

        $kategoris = new Kategori();
        $kategoris->nama_kategori = $request->nama_kategori;

        $kategoris->save();

        return redirect('/data-kategori')->with('message', 'Data kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoris = Kategori::find($id);
        return view('admin.kategori.edit', compact('kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategoris = Kategori::findOrFail($id);

        $validatedData = $request->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Kategori harus diisi!',
        ]);

        $kategoris->nama_kategori = $validatedData['nama_kategori'];

        $kategoris->save();

        return redirect('/data-kategori')->with('message', 'Data Kategori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::destroy($id);
        return redirect('/data-kategori')->with('message', 'Data Kategori berhasil dihapus!');
    }
}
