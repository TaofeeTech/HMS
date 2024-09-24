<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{

    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(RoomCategory::class, 'room_cat');
    }
    public function Bookings() {

        return $this->hasMany(Bookings::class);

    }

}
