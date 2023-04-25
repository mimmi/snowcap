<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Booking;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;
use Event;
use App\Events\BookingConfirmationEvent;

class BookingController extends Controller
{
    public function index(Request $request, int $packageId) {
        $package = Package::findOrFail($packageId);
        return Inertia::render('Booking/Create', ['package' => $package]);
    }

    public function create(Request $request) {
        $validated = $request->validate([
            'package_id' => ['required', 'exists:packages,id'],
            'start_date' => ['required', 'date', 'after:today']
        ]);

        $package = Package::find($request->get('package_id'));

        if ($request->get('start_date') > $package->expiry) {
            return redirect()->back()->with('error', 'Package expires on ' . $package->expiry);
        }

        $booking = Booking::create(array_merge($request->only([
            'package_id',
            'start_date'
        ]), [
            'user_id' => Auth::user()->id
        ]));

        Event::dispatch(new BookingConfirmationEvent($booking->id));
        return redirect()->route('booking.confirmation', ['id' => $booking->id]);
    }

    public function confirmation(Request $request, int $bookingId) {
        $booking = Booking::with(['package', 'user'])->findOrFail($bookingId);
        return Inertia::render('Booking/Confirmation', ['booking' => $booking]);
    }
}
