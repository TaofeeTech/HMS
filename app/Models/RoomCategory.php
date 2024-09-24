<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomCategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "cat_name"
    ] ;

    public function room() {

        return $this->hasMany(Room::class);

    }

}
