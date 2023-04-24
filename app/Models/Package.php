<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'days',
        'expiry',
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function itinerary()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function getExpiryAttribute()
    {
        $expiry = $this->attributes['expiry'];
        $expiry = Carbon::parse($expiry);
        return $expiry->toDateString();
    }
}
