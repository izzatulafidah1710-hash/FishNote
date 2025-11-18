<?php

namespace App\Http\Controllers;

use App\Models\InfoAkun;
use Illuminate\Http\Request;

class InfoAkunController extends Controller
{
    public function index()
    {
        $data = InfoAkun::orderBy('id', 'DESC')->get();
        return view('admin.infoakun.index', compact('data'));
    }

    public function create()
    {
        return view('admin.infoakun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'phone'  => 'nullable',
            'status' => 'required',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $avatar = null;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars', 'public');
        }

        InfoAkun::create([
            'name'   => $request->name,
            'phone'  => $request->phone,
            'status' => $request->status,
            'avatar' => $avatar,
        ]);

        return redirect()->route('infoakun.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $info = InfoAkun::findOrFail($id);
        return view('admin.infoakun.edit', compact('info'));
    }

    public function update(Request $request, $id)
    {
        $info = InfoAkun::findOrFail($id);

        $request->validate([
            'name'   => 'required',
            'phone'  => 'nullable',
            'status' => 'required',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $info->update(['avatar' => $avatar]);
        }

        $info->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return redirect()->route('infoakun.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $info = InfoAkun::findOrFail($id);
        $info->delete();

        return redirect()->route('infoakun.index')->with('success', 'Data berhasil dihapus');
    }
}
