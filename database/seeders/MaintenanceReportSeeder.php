<?php

namespace Database\Seeders;

use App\Models\MaintenanceReport;
use Illuminate\Database\Seeder;

class MaintenanceReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaintenanceReport::factory()->count(30)->create();
    }
}
