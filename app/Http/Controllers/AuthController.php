<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function dashboard(Request $request)
    {
        $search = $request->input('search');

        $units = Unit::query();

        if ($search) {
            $units->where('unit_number', 'like', "%{$search}%")
                ->orWhere('floor', 'like', "%{$search}%")
                ->orWhere('tower', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
        }

        $units = $units->paginate(10);

        return view('dashboard', ['units' => $units, 'search' => $search]);
    }

    public function storeUnit(Request $request)
    {
        $validated = $request->validate([
            'unit_number' => 'required|string|unique:units,unit_number',
            'floor' => 'required|integer',
            'tower' => 'required|string',
            'status' => 'required|string',
        ]);

        Unit::create($validated);

        return redirect()->route('dashboard')->with('success', 'Unit added successfully.');
    }

    public function registerForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', Rule::in(['user', 'admin'])],
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function updateUnit(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $validated = $request->validate([
            'unit_number' => 'required|string|unique:units,unit_number,' . $unit->id,
            'floor' => 'required|integer',
            'tower' => 'required|string',
            'status' => 'required|string',
        ]);

        $unit->update($validated);

        return redirect()->route('dashboard')->with('success', 'Unit updated successfully.');
    }

    public function deleteUnit($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->route('dashboard')->with('success', 'Unit deleted successfully.');
    }

    public function showUnit($id)
    {
        $unit = Unit::findOrFail($id);
        $maintenanceReports = \App\Models\MaintenanceReport::where('unit_id', $id)
            ->orderBy('reported_at', 'desc')
            ->get();
        return view('units.show', compact('unit', 'maintenanceReports'));
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Proses logout pengguna

        $request->session()->invalidate(); // Membuat session tidak valid

        $request->session()->regenerateToken(); // Membuat token baru

        return redirect('/'); // Arahkan ke halaman utama atau login
    }
}
