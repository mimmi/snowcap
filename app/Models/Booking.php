<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'user_id',
        'package_id',
    ];

    public function getStartDateAttribute()
    {
        $startDate = $this->attributes['start_date'];
        $startDate = Carbon::parse($startDate);
        return $startDate->toDateString();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
