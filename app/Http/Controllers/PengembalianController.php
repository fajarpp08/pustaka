<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalians = Pengembalian::paginate(10); // 10 items per page

        return view('admin.pengembalian.index', compact('pengembalians'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengembalian $pengembalians, $id)
    {
        return view('admin.pengembalian.edit', [
            'pengembalians' => Pengembalian::find($id),
            // 'users' => User::all(),
            // 'mobils' => Mobil::all(),
            // 'peminjamans' => Peminjaman::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pengembalians = Pengembalian::findOrFail($id);

        $validatedData = $request->validate([
            'tgl_kembali' => 'required',
            // 'peminjaman_id' => 'required',
        ], [
            'tgl_kembali.required' => 'kolom tanggal harus diisi',
            // 'peminjaman_id.required' => 'kolom sewa harus diisi',
        ]);
        // dd($pengembalians);
        $pengembalians->tgl_kembali = $validatedData['tgl_kembali'];
        // $pengembalians->peminjaman_id = $validatedData['peminjaman_id'];

        $pengembalians->save();

        return redirect('/pengembalian')->with('message', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengembalian::destroy($id);
        return redirect('/pengembalian')->with('message', 'Data berhasil dihapus!');
    }
}
