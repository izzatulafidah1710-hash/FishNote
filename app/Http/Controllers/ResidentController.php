<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident; 

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();

        return view('pages.resident.index', [
            'residents' => $residents,
        ]);
    }

    public function create()
    {
        return view('pages.resident.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'unique:residents,email'],
            'phone'         => ['nullable', 'string', 'max:15'],
            'address'       => ['nullable', 'string', 'max:255'],
            'farm_location' => ['nullable', 'string', 'max:255'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'status'        => ['required', 'in:active,inactive'],
        ]);

        Resident::create($request->validated());

        return redirect('/resident')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $resident = Resident::findOrFail($id);

        return view('pages.resident.edit', [ // sebaiknya pakai file view "edit.blade.php"
            'resident' => $resident,
        ]);
    }

    public function update(Request $request, $id)
    {
        $resident = Resident::findOrFail($id);

        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:100'],
            'email'         => ['required', 'email', 'unique:residents,email,' . $resident->id],
            'phone'         => ['nullable', 'string', 'max:15'],
            'address'       => ['nullable', 'string', 'max:255'],
            'farm_location' => ['nullable', 'string', 'max:255'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'status'        => ['required', 'in:active,inactive'],
        ]);

        Resident::findOrFail($id)->update($request->validated);

        return redirect('/resident')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        $resident = Resident::findOrFail($id); 
        $resident->delete();

        return redirect('/resident')->with('success', 'Berhasil menghapus data');
    }
}
