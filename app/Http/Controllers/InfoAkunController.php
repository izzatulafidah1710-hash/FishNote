<?php

namespace App\Http\Controllers;

use App\Models\InfoAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InfoAkunController extends Controller
{
    /**
     * Tampilkan semua data info akun.
     */
    public function index()
    {
        $data = InfoAkun::all();
        return view('admin.infoakun.index', compact('data'));
    }

    /**
     * Form tambah data.
     */
    public function create()
    {
        return view('admin.infoakun.create');
    }

    /**
     * Simpan data ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:info_akuns,email',
            'no_hp' => 'required',
            'alamat' => 'required',
            'password' => 'required|min=6',
        ]);

        InfoAkun::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('infoakun.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Form edit data.
     */
    public function edit($id)
    {
        $info = InfoAkun::findOrFail($id);
        return view('admin.infoakun.edit', compact('info'));
    }

    /**
     * Update data di database.
     */
    public function update(Request $request, $id)
    {
        $info = InfoAkun::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:info_akuns,email,'.$id,
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $info->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        if ($request->password) {
            $info->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('infoakun.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        $info = InfoAkun::findOrFail($id);
        $info->delete();

        return redirect()->route('infoakun.index')->with('success', 'Data berhasil dihapus');
    }
}
