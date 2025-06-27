<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_number',
        'floor',
        'tower',
        'status',
    ];

    public function maintenanceReports()
    {
        return $this->hasMany(\App\Models\MaintenanceReport::class);
    }
}
