<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Notification; // <-- IMPORT MODEL NOTIFICATION
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- IMPORT FACADE AUTH

class UnitController extends Controller
{
    /**
     * Menampilkan halaman dashboard dengan daftar unit.
     */
    public function index(Request $request) 
    {
        // Memulai query builder
        $query = Unit::query();

        // Terapkan filter berdasarkan status jika ada
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Terapkan filter berdasarkan pencarian jika ada
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('unit_number', 'like', "%{$searchTerm}%")
                  ->orWhere('floor', 'like', "%{$searchTerm}%")
                  ->orWhere('tower', 'like', "%{$searchTerm}%")
                  ->orWhere('status', 'like', "%{$searchTerm}%");
            });
        }
        
        // Ambil data setelah semua filter diterapkan, lalu paginasi
        $units = $query->latest()->paginate(10)->withQueryString();

        // Kirim data ke view
        return view('dashboard', [
            'units' => $units,
            'search' => $request->search ?? ''
        ]);
    }

    public function store(Request $request)
    {
        // ... kode validasi dan create unit Anda ...
        $unit = Unit::create($validatedData);

        // TAMBAHKAN LOGIKA INI
        if ($unit->status == 'maintenance') {
            Notification::create([
                'user_id' => Auth::id(), // Notif untuk diri sendiri, atau bisa ke semua admin
                'message' => 'Unit ' . $unit->unit_number . ' dijadwalkan untuk maintenance.',
                'link' => route('units.show', $unit->id) // Link ke detail unit
            ]);
        }
        
        return redirect()->route('dashboard')->with('success', 'Unit added successfully!');
    }

    public function update(Request $request, Unit $unit)
    {
        // ... kode validasi dan update unit Anda ...
        $unit->update($validatedData);

        // TAMBAHKAN LOGIKA INI
        if ($unit->status == 'maintenance') {
             Notification::create([
                'user_id' => Auth::id(), 
                'message' => 'Status unit ' . $unit->unit_number . ' diubah menjadi maintenance.',
                'link' => route('units.show', $unit->id)
            ]);
        }

        return redirect()->route('dashboard')->with('success', 'Unit updated successfully!');
    }

    // Nanti Anda bisa menambahkan method lain di sini
    // seperti store(), update(), destroy(), dll.
}