<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function itinerary(): HasMany
    {
        return $this->hasMany(Itinerary::class);
    }
}
