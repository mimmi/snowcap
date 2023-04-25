<?php

namespace App\Listeners;

use App\Events\BookingConfirmationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Booking;
use Mail;

class BookingConfirmationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BookingConfirmationEvent $event): void
    {
        $booking = Booking::with(['user','package'])->find($event->bookingId);

        Mail::send('confirmation', ['booking' => $booking], function($message) use ($booking) {
            $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $message->to($booking->user->email);
            $message->subject('Booking Confirmation');

        });
    }
}
