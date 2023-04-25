<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <p>Dear {{ $booking->user->name }},</p>
    <p>Thank you for booking with us! Your booking has been confirmed.</p>
    <p>Booking Details:</p>
    <ul>
        <li>Booking ID: {{ $booking->id }}</li>
        <li>Booking Date: {{ $booking->start_date }}</li>
        <li>Booking Duration: {{ $booking->package->days }} days</li>
        <li>Booking Location: Maldives</li>
    </ul>
    <p>If you have any questions or need to make changes to your booking, please contact us.</p>
    <p>Thank you for choosing our service!</p>
</body>
</html>
