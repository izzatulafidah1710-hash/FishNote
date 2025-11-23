<?php

namespace App\Http\Controllers;

use App\Models\PeternakActivity;
use Illuminate\Http\Request;

class PeternakActivityController extends Controller
{
    public function index()
    {
        $activities = PeternakActivity::orderBy('created_at', 'desc')->get();

        return view('admin.activities.index', compact('activities'));
    }

    // Menyimpan aktivitas peternak
    public function store(Request $request)
    {
        PeternakActivity::create([
            'peternak_id'   => $request->peternak_id,
            'activity_type' => $request->activity_type,
            'description'   => $request->description,
            'related_module'=> $request->related_module,
            'related_id'    => $request->related_id,
        ]);

        return response()->json(['message' => 'Activity saved'], 201);
    }

    // Menghapus aktivitas tertentu
    public function destroy($id)
    {
        $activity = PeternakActivity::findOrFail($id);
        $activity->delete();

        return redirect()->back()->with('success', 'Aktivitas berhasil dihapus');
    }
}
