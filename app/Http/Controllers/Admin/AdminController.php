<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\RoomCategory;
use Illuminate\Database\QueryException;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{

    public function AllRoomCategory()
    {

        $roomCats = RoomCategory::latest()->get();

        return view("admin.Rooms.room_cat", compact("roomCats"));

    }//End Method

    public function AddRoomCategory()
    {

        return view("admin.Rooms.add_room_cat");

    }//End Method

    public function StoreRoomCategory(Request $request)
    {

        $request->validate([
            "cat_name" => "required",
        ]);

        // $image = $this->UploadFile($request->file("file"), 20, 20, 'rooms');

        $result = RoomCategory::create([
            "cat_name" => $request->cat_name
        ]);

        if ($result) {

            return redirect()->route('room.cats')->with("mssg", "New Category Added");

        } else {

            return back()->with("mssg", 'Unable to Add Category, An Error Occured');

        }


    }//End Method

    public function EditRoomCategory($id)
    {

        $roomCategory = RoomCategory::findOrFail($id);

        return view('admin.Rooms.edit_room_cat', compact('roomCategory'));

    }//End Method

    public function UpdateRoomCategory(Request $request)
    {

        $id = $request->id;

        $request->validate([
            'cat_name' => 'required',
        ], [
            'cat_name.required' => 'Category Name is Required'
        ]);

        $query = RoomCategory::findOrFail($id);

        $result = $query->update([
            'cat_name' => $request->cat_name
        ]);

        if ($result) {

            return redirect()->route('room.cats')->with('mssg', 'Room Category Updated');

        } else {

            return back()->with('mssg', 'An Error Occured, please Contact the Technical');

        }

    }//End Method

    public function DeleteRoomCategory($id)
    {

        $category = RoomCategory::findOrFail($id);

        $query = $category->delete();

        if ($query) {

            return redirect()->route('room.cats')->with('mssg', 'Room Category Deleted');

        } else {

            return back()->with('mssg', 'An Error Occured');

        }

    }//End Method

    public function AllRooms()
    {


        // $rooms = Room::latest()->get();

        $rooms = Room::with('category')->latest()->get();

        // $rooms = Room::whereHas('category')->with('category')->latest()->get();

        return view("admin.Rooms.rooms", compact("rooms"));

    }//End Method

    public function AddRoom()
    {

        $categories = RoomCategory::all();

        return view("admin.Rooms.add_room", compact('categories'));

    }//End Method

    public function StoreRoom(Request $request)
    {

        $images = $request->file("images");
        $image = [];

        $request->validate([

            "room_number" => ['required'],
            "room_type" => ['required'],
            "description" => ['required'],
            "price_per_night" => ['required'],
            "capacity" => ['required'],
            "room_cat" => ['required'],
            "images" => ['required'],

        ]);

        foreach ($images as $img) {

            $image[] = upload_file($img, 154, 92, "rooms");

        }

        $save_url = json_encode($image);

        try {

            Room::create([

                "room_number" => $request->room_number,
                "room_type" => $request->room_type,
                "room_cat" => $request->room_cat,
                "description" => $request->description,
                "price_per_night" => $request->price_per_night,
                "capacity" => $request->capacity,
                "images" => $save_url,

            ]);

            return redirect()->route('rooms.all')->with("mssg", "New Room Added");

        } catch (QueryException $e) {

            if ($e->errorInfo[1] == 1062) {
                return back()->withErrors(['room_number' => 'The room number already exists.'])->withInput();
            }

            return back()->with('mssg', 'Unable to Add Room, An Error Occurred')->withInput();

        }

    }//End Method

    public function EditRoom($id)
    {

        $room = Room::findOrFail($id);
        $categories = RoomCategory::all();

        return view('admin.Rooms.edit_room', compact('room', 'categories'));

    }//End Method

    public function UpdateRoom(Request $request)
    {

        $id = $request->id;

        $room = Room::findOrFail($id);

        $image = [];

        $request->validate([

            "room_number" => ['required'],
            "room_type" => ['required'],
            "description" => ['required'],
            "price_per_night" => ['required'],
            "capacity" => ['required'],

        ]);

        if ($request->hasFile('images')) {

            $images = $request->file("images");

            foreach ($images as $img) {

                $image[] = upload_file($img, 154, 92, "rooms");

            }

            $save_url = json_encode($image);

            $prev_image = json_decode($room->images);

            foreach ($prev_image as $item) {

                unlink($item);

            }

        } else {

            $save_url = $room->images;

        }

        $query = $room->update([

            "room_number" => $request->room_number,
            "room_type" => $request->room_type,
            "description" => $request->description,
            "price_per_night" => $request->price_per_night,
            "capacity" => $request->capacity,
            "images" => $save_url,

        ]);

        if ($query) {

            return redirect()->route('rooms.all')->with("mssg", "New Room Updated");

        } else {

            return back()->with("mssg", 'Unable to Add Category, An Error Occured');

        }



    }//End Method

    public function DeleteRoom($id)
    {

        $room = Room::findOrFail($id);

        $query = $room->delete();

        if ($query) {

            return redirect()->route('rooms.all')->with('mssg', 'Room Deleted');

        } else {

            return back()->with('mssg', 'An Error Occured');

        }

    }//End Method
    public function AllBookings()
    {

        $bookings = Bookings::latest()
        ->get();

        return view('admin.Bookings.bookings', compact('bookings'));

    }//End Method

    // private function UploadFile($file, $h, $w, $path)
    // {

    //     if ($file) {

    //         $manager = new ImageManager(new Driver());
    //         $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
    //         $img = $manager->read($file);
    //         $img = $img->resize($h, $w);
    //         $img->toJpeg(80)->save(base_path('public/uploads/' . $path . '/' . $name_gen));
    //         $save_url = 'uploads/' . $path . '/' . $name_gen;

    //         return $save_url;

    //     }

    // }//End Method

}
