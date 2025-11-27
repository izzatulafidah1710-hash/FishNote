<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident; 

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = Resident::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.resident.index', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resident.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|unique:residents,email',
            'phone'         => 'nullable|string|max:15',
            'address'       => 'nullable|string|max:255',
            'farm_location' => 'nullable|string|max:255',
        ]);

        Resident::create($validated);

        return redirect()->route('admin.datapeternak.index')
            ->with('success', 'Data peternak berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $resident = Resident::findOrFail($id);

        return view('admin.resident.show', compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $resident = Resident::findOrFail($id);

        return view('admin.resident.edit', compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resident = Resident::findOrFail($id);

        $validated = $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|unique:residents,email,' . $resident->id,
            'phone'         => 'nullable|string|max:15',
            'address'       => 'nullable|string|max:255',
            'farm_location' => 'nullable|string|max:255',
        ]);

        $resident->update($validated);

        return redirect()->route('admin.datapeternak.index')
            ->with('success', 'Data peternak berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resident = Resident::findOrFail($id); 
        $resident->delete();

        return redirect()->route('admin.datapeternak.index')
            ->with('success', 'Data peternak berhasil dihapus');
    }
}