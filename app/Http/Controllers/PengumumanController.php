<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::all();

        return view('admin.pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        $pengumumans = Pengumuman::all();

        return view('admin.pengumuman.create', compact('pengumumans'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_pengumuman' => 'required',
            'deskripsi_pengumuman' => 'required',
            'tanggal_pengumuman' => 'required',
            'gambar_pengumuman' => 'nullable',
        ], [
            'judul_pengumuman.required' => 'Judul Pengumuman harus diisi!',
            'deskripsi_pengumuman.required' => 'Deskripsi Pengumuman harus diisi',
            'tanggal_pengumuman.required' => 'Tanggal Pengumuman harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect('/data-pengumuman')->withErrors($validator)->withInput();
        }
        $pengumumans = $validator->valid();

        $pengumumans = new Pengumuman();
        $pengumumans->judul_pengumuman = $request->judul_pengumuman;
        $pengumumans->deskripsi_pengumuman = $request->deskripsi_pengumuman;
        $pengumumans->tanggal_pengumuman = $request->tanggal_pengumuman;

        if ($request->hasFile('gambar_pengumuman')) {
            $file = $request->file('gambar_pengumuman');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('pengumuman', $fileName, 'public');
            $pengumumans->gambar_pengumuman = $fileName;
        }
        // dd($pengumumans);

        $pengumumans->save();

        return redirect('/data-pengumuman')->with('message', 'Data Pengumuman berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengumumans = Pengumuman::find($id);

        return view('admin.pengumuman.edit', compact('pengumumans'));
    }
    public function update(Request $request, string $id)
    {
        $pengumumans = Pengumuman::findOrFail($id);

        $validatedData = $request->validate([
            'judul_pengumuman' => 'required',
            'deskripsi_pengumuman' => 'required',
            'tanggal_pengumuman' => 'required',
            'gambar_pengumuman' => 'nullable',
        ], [
            'judul_pengumuman.required' => 'Judul pengumuman harus diisi!',
            'deskripsi_pengumuman.required' => 'Deskripsi pengumuman harus diisi',
            'tanggal_pengumuman.required' => 'Tanggal pengumuman harus diisi',
        ]);

        $pengumumans->judul_pengumuman = $validatedData['judul_pengumuman'];
        $pengumumans->deskripsi_pengumuman = $validatedData['deskripsi_pengumuman'];
        $pengumumans->tanggal_pengumuman = $validatedData['tanggal_pengumuman'];

        if ($request->hasFile('gambar_pengumuman')) {
            $file = $request->file('gambar_pengumuman');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('pengumuman', $fileName, 'public');
            $pengumumans->gambar_pengumuman = $fileName;
        }
        // dd($pengumumans);
        $pengumumans->save();

        return redirect('/data-pengumuman')->with('message', 'Data Pengumuman berhasil diubah!');
    }

    public function destroy(string $id)
    {
        Pengumuman::destroy($id);
        return redirect('/data-pengumuman')->with('message', 'Data Pengumuman berhasil dihapus!');
    }
}
