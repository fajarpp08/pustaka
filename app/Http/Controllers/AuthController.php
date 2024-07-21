<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Silahkan Masukkkan Email',
            'password.required' => 'Silahkan Masukkan Password.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();

                if ($user->role == 'Admin') {
                    return redirect()->route('dashboardAdmin');
                } elseif ($user->role == 'User') {
                    return redirect()->route('dashboardUser');
                }
            } else {
                // Password salah
                $validator->errors()->add('password', 'Password salah!');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } else {
            $validator->errors()->add('email', 'Email ini tidak terdaftar!');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function register()
    {
        return view('register');
    }

    public function saveRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:users',
            'nohp' => 'required|unique:users',
            // 'noanggota' => 'required|unique:users',
            'password' => 'required',

        ], [
            'nama.required' => 'Nama harus diisi!',
            'alamat.required' => 'Alamat harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.unique' => 'Email ini sudah terdaftar, silahkan ganti!',
            'nohp.required' => 'Nomor HP harus diisi!',
            'nohp.unique' => 'Nomor HP ini sudah ada, silahkan ganti!',
            // 'noanggota.required' => 'Nomor Anggota harus diisi!',
            // 'noanggota.unique' => 'Nomor Anggota ini sudah ada, silahkan ganti!',
            'password.required' => 'Password harus diisi!',
        ]);

        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator)->withInput();
        }
        $register = $validator->valid();

        // Generate nomor anggota
        $noAnggota = $this->generateNoAnggota();

        $register = new User();
        $register->nama = $request->nama;
        $register->alamat = $request->alamat;
        $register->email = $request->email;
        $register->nohp = $request->nohp;
        $register->noanggota = $noAnggota;
        $register->password = Hash::make($request->password);
        // dd($register);
        $register->save();

        return redirect('/login')->with('message', 'Akun berhasil dibuat, silahkan login!');
    }

    // Generate noanggota
    private function generateNoAnggota()
    {
        $lastUser = User::orderBy('id', 'desc')->first();
        $lastNoAnggota = $lastUser ? $lastUser->noanggota : null;

        if ($lastNoAnggota) {
            $lastNoAnggotaNumber = intval(substr($lastNoAnggota, -4));
            $newNoAnggotaNumber = $lastNoAnggotaNumber + 1;
            $newNoAnggota = 'PERP-' . str_pad($newNoAnggotaNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newNoAnggota = 'PERP-0001';
        }

        return $newNoAnggota;
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
