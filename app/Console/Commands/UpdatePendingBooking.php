<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bookings;
use Carbon\Carbon;

class UpdatePendingBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:update-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update pending bookings to cancelled if older than 24 hours';

    /**
     * Contruction function
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get current time
        $now = Carbon::now();

        $twoMInutesAgo = $now->subMinutes(2);

        // $bookings = Bookings::where('status', 'pending')
        // ->where('booking_date', '<=', $now->subHours(2))
        // // ->delete();
        // ->update(['status' => 'cancelled']);

        // $bookings = Bookings::whereDate('booking_date', '<=', $now->subMinutes(2))
        // ->where('status', 'pending')
        // ->update(['status' => 'cancelled']);

        // $bookings = Bookings::whereBetween('booking_date', '<=', $now->subMinutes(2))
        // $bookings = Bookings::whereBetween('created_at', [$twoMInutesAgo, $now])
        // ->where('status', 'pending')
        // ->update(['status' => 'cancelled']);
        // $bookings->delete();

        // $bookings = Bookings::where('status', 'pending')
        // ->where('created_at', '<=', $now->subMinutes(2))
        // ->update(['status' => 'cancelled']);

        $bookings = Bookings::where('booking_date', '<=', $now->subHours(2))
            ->where('status', 'pending')
            ->update(['status' => 'cancelled']);

        $deleteBookings = Bookings::where('status', 'cancelled')
            ->delete();

        $this->info("updated {[$bookings, $deleteBookings]} bookings to cancelled");
    }
}
