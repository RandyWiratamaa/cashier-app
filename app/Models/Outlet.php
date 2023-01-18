<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'province_id', 'regency_id', 'district_id', 'village_id', 'address_detail', 'postal_code', 'phone_number'
    ];
}
