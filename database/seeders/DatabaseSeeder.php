<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Itinerary;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create an administrative users
        User::create([
            'name' => 'Ibrahim Mimrah',
            'email' => 'mimrah14@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'administrator' => true
        ]);

        // Create 19 normal users
        $users = User::factory(19)->create();

        // Create some packages and add itineraries
        $basic = Package::create([
            'name' => 'Basic Package',
            'days' => 3
        ]);

        Itinerary::create([
            'name' => 'Speedboat Transfer to Gili Lankanfushi',
            'type' => 'travel',
            'package_id' => $basic->id
        ]);

        Itinerary::create([
            'name' => 'Check Into Hotel',
            'type' => 'hotel',
            'package_id' => $basic->id
        ]);

        Itinerary::create([
            'name' => 'Private Trip to Sandbank',
            'type' => 'activity',
            'package_id' => $basic->id
        ]);

        Itinerary::create([
            'name' => 'Private Aerial Drone Shoot on Sandbank',
            'type' => 'activity',
            'package_id' => $basic->id
        ]);

        Itinerary::create([
            'name' => 'Private Snorkeling Experience',
            'type' => 'activity',
            'package_id' => $basic->id
        ]);

        Itinerary::create([
            'name' => 'Couples Private Dinner Night',
            'type' => 'activity',
            'package_id' => $basic->id
        ]);

        Itinerary::create([
            'name' => 'Check Out from Hotel',
            'type' => 'hotel',
            'package_id' => $basic->id
        ]);

        Itinerary::create([
            'name' => 'Speedboat Transfer to Velana International Airport',
            'type' => 'travel',
            'package_id' => $basic->id
        ]);

        $gold = Package::create([
            'name' => 'Gold Package',
            'days' => 5
        ]);

        Itinerary::create([
            'name' => 'Speedboat Transfer to SAii Lagoon Maldives',
            'type' => 'travel',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Check Into SAii Lagoon Hotel (3 Nights)',
            'type' => 'hotel',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Private Trip to Sandbank',
            'type' => 'activity',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Private Aerial Drone Shoot on Sandbank',
            'type' => 'activity',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Private Snorkeling Experience',
            'type' => 'activity',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Couples Private Dinner Night',
            'type' => 'activity',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Check Out from Hotel',
            'type' => 'hotel',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Speedboat Transfer to Maafushi Local Island',
            'type' => 'travel',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Check Into Hotel (2 Nights)',
            'type' => 'hotel',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Romantic Couple Parasailing Experience',
            'type' => 'activity',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Private Couples Stargazing Night',
            'type' => 'activity',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Barbeque Experience with Freshly Caught Fish',
            'type' => 'activity',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Check Out from Hotel',
            'type' => 'hotel',
            'package_id' => $gold->id
        ]);

        Itinerary::create([
            'name' => 'Speedboat Transfer to Velana International Airport',
            'type' => 'travel',
            'package_id' => $gold->id
        ]);

        $premium = Package::create([
            'name' => 'Premium Package',
            'days' => 7
        ]);

        Itinerary::create([
            'name' => 'Speedboat Transfer to SAii Lagoon Maldives',
            'type' => 'travel',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Check Into SAii Lagoon Hotel (5 Nights)',
            'type' => 'hotel',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Private Trip to Sandbank',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Private Aerial Drone Shoot on Sandbank',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Private Snorkeling Experience',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Couples Flyboarding Experience',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Couples Jet Ski Experience',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Couples Kayak Experience',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Couples Private Dinner Night',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Check Out from Hotel',
            'type' => 'hotel',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Speedboat Transfer to Maafushi Local Island',
            'type' => 'travel',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Check Into Hotel (2 Nights)',
            'type' => 'hotel',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Romantic Couple Parasailing Experience',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Ship Wreck Visit',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Dolphin Watching',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Private Couples Stargazing Night',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Barbeque Experience with Freshly Caught Fish',
            'type' => 'activity',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Check Out from Hotel',
            'type' => 'hotel',
            'package_id' => $premium->id
        ]);

        Itinerary::create([
            'name' => 'Speedboat Transfer to Velana International Airport',
            'type' => 'travel',
            'package_id' => $premium->id
        ]);

        foreach ($users as $user) {
            Booking::create([
                'user_id' => $user->id,
                'package_id' => rand(1,3),
                'start_date' => Carbon::today()->addDays(rand(1, 365))
            ]);
        }
    }
}