<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'number_of_guests',
        'text',
        'discount_code',
        'status',
        'payment_status',
        'total_price',
    ];

    static public function BookedRooms($arrival_date, $departure_date)
    {

        return self::where(function ($query) use ($arrival_date, $departure_date) {
            $query->whereBetween('check_in_date', [$arrival_date, $departure_date])
                ->orWhereBetween('check_out_date', [$arrival_date, $departure_date])
                ->orWhere(function ($query) use ($arrival_date, $departure_date) {
                    $query->where('check_in_date', '<=', $arrival_date)
                        ->where('check_out_date', '>=', $departure_date);
                });
        })->pluck('room_id');

    }

}
