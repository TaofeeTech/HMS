<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rooms extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'room_number',
        'room_category_id',
        'type',
        'capacity',
        'price',
        'description',
        'is_available',
        'size',       // Optional: Room size
        'image',      // Optional: Room image
        'features',   // Optional: Room features
        'bed',
        'bathroom',
        'short_description',
        'nickname'
    ];

    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id');
    }

    /**
     * Add a new room to the database
     *
     * @param array $data - The room data to be added
     * @return Rooms|null - The created room instance or null on failure
     */

    static public function Add($data)
    {

        try {

            // $room = self::create([
            //     'room_number' => $data['room_number'],
            //     'room_category_id' => $data['room_category_id'],
            //     'type' => $data['type'],
            //     'capacity' => $data['capacity'],
            //     'price' => $data['price'],
            //     'description' => $data['description'] ?? null,
            //     'is_available' => $data['is_available'] ?? true,
            //     'size' => $data['size'] ?? null,
            //     'image' => $data['image'] ?? null,
            //     'features' => $data['features'] ?? null,
            //     'bed' => $data['bed'],
            //     'bathroom' => $data['bathroom'],
            //     'nickname' => $data['nickname'] ?? null,
            //     'short_description' => $data['short_description']
            // ]);

            $room = self::create($data);
            return $room;

        } catch (\Exception $e) {

            throw $e;

        }
    }

    /**
     * Edit the details of an existing room
     *
     * @param int $id - The ID of the room to be updated
     * @param array $data - The room data to update
     * @return Rooms|null - The updated room instance or null on failure
     */
    static public function Edit($id, $data)
    {
        try {

            $room = self::find($id);


            if (!$room) {
                return null;
            }


            $filteredData = array_filter($data, function ($value) {
                return !is_null($value);
            });


            $room->update($filteredData);

            return $room;

        } catch (\Exception $e) {
            \Log::error('Room update failed: ' . $e->getMessage());
            return null;
        }
    }

    static public function DeleteRoom($id)
    {

        try {

            $room = self::find($id);

            if (!$room) {

                return null;

            }

            $room->delete($id);

            return $room;

        } catch (\Exception $e) {

            \Log::error('Room update failed: ' . $e->getMessage());
            return [$e->getMessage(), null];

        }

    }

    static public function SearchRoom($data)
    {

        try {

            $rooms = self::where('type', $data['type'])
                ->where('is_available', 1)
                ->latest()
                ->get();
            // return $rooms;
            $availableRooms = $rooms->filter(function ($room) use ($data) {
                return $room->capacity >= $data['num_guest'];
            });

            return $availableRooms;

        } catch (\Exception $e) {

            throw $e;

        }

    }


}
