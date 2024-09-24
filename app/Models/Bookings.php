<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookings extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'room_id',
        'guest_id',
        'arrival_date',
        'departure_date',
        'status',
        'num_guests',
        'room_type',
        'rate',
        'total_cost',
        'payment_method',
        'payment_status',
    ];

    public function room(){
        return $this->belongsTo(Room::class, 'room_id');
    }

    static public function BookedRooms($arrival_date, $departure_date){

        return self::where(function ($query) use ($arrival_date, $departure_date) {
            $query->whereBetween('arrival_date', [$arrival_date, $departure_date])
                ->orWhereBetween('departure_date', [$arrival_date, $departure_date])
                ->orWhere(function ($query) use ($arrival_date, $departure_date) {
                    $query->where('arrival_date', '<=', $arrival_date)
                        ->where('departure_date', '>=', $departure_date);
                });
        })->pluck('room_id');

    }//End Method

}

