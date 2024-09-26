<?php

namespace App\Console\Commands;

use App\Models\Bookings;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class checkBookedRooms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:check-booked-rooms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks Bookings and validate it, if customer stay is completed then close it';

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

        $now = Carbon::now();

        $completedBookings = Bookings::where('departure_date', '<=', $now)
            ->where('status', 'confirmed')
            ->update(['status' => 'closed']);


        $this->info("updated {$completedBookings} bookings to closed");


    }

}
