<?php

namespace App\Providers;

use App\Models\Unit; // <-- UBAH INI (atau tambahkan)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('partials.header', function ($view) {
            if (Auth::check()) {
                // Query untuk mengambil unit yang sedang maintenance
                $maintenanceUnits = Unit::where('status', 'maintenance')->latest()->get();

                // Mengirim data ke view dengan nama '$maintenanceUnits'
                $view->with('maintenanceUnits', $maintenanceUnits); 
            }
        });
    }
}