<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { {
            $users = User::paginate(10); // 10 items per page

            return view('admin.user.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:users',
            'noanggota' => 'required|unique:users',
            'nohp' => 'required|unique:users',
            'password' => 'required',
            'role' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi!',
            'alamat.required' => 'Alamat harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email ini sudah digunakan, silahkan ganti dengan Email yang lain!',
            'noanggota.required' => 'Nomor anggota harus diisi!',
            'noanggota.unique' => 'Nomor anggota ini sudah digunakan, silahkan ganti dengan nomor anggota yang lain!',
            'nohp.required' => 'Nomor HP harus diisi!',
            'nohp.unique' => 'Nomor HP ini sudah digunakan, silahkan ganti dengan nomor HP yang lain!',
            'role.required' => 'Role harus diisi!',
            'password.required' => 'Password harus diisi!',
        ]);


        if ($validator->fails()) {
            return redirect('/data-user/create')->withErrors($validator)->withInput();
        }
        $user = $validator->valid();

        $user = new User();
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->noanggota = $request->noanggota;
        $user->nohp = $request->nohp;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;

        $user->save();

        return redirect('/data-user')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('admin.user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'noanggota' => 'required',
            'nohp' => 'required',
            'role' => 'required',
            'password' => 'nullable',
        ], [
            'nama.required' => 'kolom nama harus diisi',
            'email.required' => 'kolom email harus diisi',
            'alamat.required' => 'kolom alamat harus diisi',
            'noanggota.required' => 'kolom nomor sim harus berisi',
            'nohp.required' => 'kolom nomor anggota harus diisi',
            'password.required' => 'kolom password harus diisi',
            'role.required' => 'kolom role harus diisi',
        ]);

        $user->nama = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->alamat = $validatedData['alamat'];
        $user->noanggota = $validatedData['noanggota'];
        $user->nohp = $validatedData['nohp'];
        $user->password = Hash::make($request->password);
        $user->role = $validatedData['role'];

        $user->save();

        return redirect('/data-user')->with('message', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/data-user')->with('message', 'Data berhasil dihapus!');
    }

}
