<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'package_id',
    ];

    public function package()
    {
        return $this->belongsTo(Itinerary::class);
    }
}
