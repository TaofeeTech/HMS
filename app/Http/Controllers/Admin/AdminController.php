<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rooms;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
// use
// use validator()


class AdminController extends Controller
{

    public function DeleteRoom($id)
    {

        $room_id = $id;

        try {

            $deletedRoom = Rooms::DeleteRoom($room_id);

            return back()->with('mssg', 'Room Deleted Successfully');

        } catch (\Exception $e) {

            return back()->with('error', 'Unable to Process Your Request, Something Unexpected Went Wrong!');

        }

    }//End Method

    public function UpdateRoomDetails(Request $request)
    {

        $validatedDate = $request->validate([
            "room_number" => ['required'],
            "room_category_id" => ['required'],
            "type" => ['required'],
            "capacity" => ['required'],
            "price" => ['required'],
            "description" => ['required'],
            "image" => 'nullable',
            "bed" => ['numeric', 'required'],
            "bathroom" => ['numeric', 'required'],
            "short_description" => ['required'],
        ]);

        $room_id = $request->id;

        if ($request->hasFile('image')) {

            $images = $request->file('image');
            $image = [];

            foreach ($images as $img) {

                $image[] = self::Upload_File($img, 384, 420, "rooms");

            }

            $save_url = json_encode($image);

            self::Unlink_Prev_image($room_id);

        }

        $features = [
            'swim' => [
                'name' => 'Swimming Pool',
                'icon' => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 23.6968C2.91 22.8485 5.08999 22.8485 7.00004 23.6968C8.90999 24.5451 11.09 24.5451 13 23.6968C14.91 22.8485 17.09 22.8485 19 23.6968C20.91 24.5451 23.09 24.5451 25 23.6968C26.91 22.8485 29.09 22.8485 31 23.6968" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M9.33203 9.3335H22.6653" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M9.33203 16H22.6653" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M22.666 19.3333V3.5C22.666 2.12 23.786 1 25.166 1C26.546 1 27.666 2.12 27.666 3.5" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M9.33203 19.3333V3.5C9.33203 2.12 10.452 1 11.832 1C13.212 1 14.332 2.12 14.332 3.5" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M1 30.3631C2.91 29.5147 5.08999 29.5147 7.00004 30.3631C8.90999 31.2114 11.09 31.2114 13 30.3631C14.91 29.5147 17.09 29.5147 19 30.3631C20.91 31.2114 23.09 31.2114 25 30.3631C26.91 29.5147 29.09 29.5147 31 30.3631" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>'
            ],
            'wifi' => [
                'name' => 'Wifi',
                'icon' => '<svg width="34" height="26" viewBox="0 0 34 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M17 24.8168L17.0167 24.7983" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M1 6.39997C10.6 -0.79999 23.4 -0.79999 33 6.39997" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M5.79883 12.7997C12.1989 7.99971 21.7989 7.99971 28.1988 12.7997" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M11.4004 18.4C15.0011 16.1599 19.0001 16.1593 22.6005 18.4" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>'
            ],
            'food' => [
                'name' => 'Lunch & Breakfast',
                'icon' => '<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M20.6672 20.9999V19.3332C20.6672 16.5716 18.4289 14.3333 15.6673 14.3333H7.33396C4.57231 14.3333 2.33398 16.5716 2.33398 19.3332V20.9999" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3339 31H5.6673C3.82565 31 2.33398 29.5084 2.33398 27.6667V26H20.6672V27.6667C20.6672 29.5084 19.1755 31 17.3339 31Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M0.666016 21H22.3326" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M15.1379 14.3329L14.5029 9.5529C14.3712 8.55296 15.1479 7.66626 16.1562 7.66626H30.6645C31.6795 7.66626 32.4578 8.56462 32.3145 9.5679L29.4578 29.5679C29.3395 30.3895 28.6361 30.9995 27.8078 30.9995H24.2528" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M29.2517 1H25.6901C24.8634 1 24.1634 1.60499 24.0417 2.42166L23.2617 7.66664" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>'
            ],
            'fitness' => [
                'name' => 'Fitness Center',
                'icon' => '<svg width="38" height="18" viewBox="0 0 38 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M11.8645 1H6.49729C6.17195 1 5.9082 1.26381 5.9082 1.58909V16.7744C5.9082 17.0998 6.17195 17.3635 6.49729 17.3635H11.8645C12.1898 17.3635 12.4536 17.0998 12.4536 16.7744V1.58909C12.4536 1.26381 12.1898 1 11.8645 1Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M31.5032 1H26.136C25.8106 1 25.5469 1.26381 25.5469 1.58909V16.7744C25.5469 17.0998 25.8106 17.3635 26.136 17.3635H31.5032C31.8285 17.3635 32.0923 17.0998 32.0923 16.7744V1.58909C32.0923 1.26381 31.8285 1 31.5032 1Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M1 13.502V4.86203C1 4.53676 1.26374 4.27295 1.58909 4.27295H5.31996C5.6453 4.27295 5.90905 4.53676 5.90905 4.86203V13.502C5.90905 13.8273 5.6453 14.091 5.31996 14.091H1.58909C1.26374 14.091 1 13.8273 1 13.502Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M37.0008 13.502V4.86203C37.0008 4.53676 36.7371 4.27295 36.4118 4.27295H32.6809C32.3555 4.27295 32.0918 4.53676 32.0918 4.86203V13.502C32.0918 13.8273 32.3555 14.091 32.6809 14.091H36.4118C36.7371 14.091 37.0008 13.8273 37.0008 13.502Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M12.4531 9.18164H25.5439" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>'
            ],
        ];

        $selectedFeatures = [];

        foreach ($features as $key => $feature) {

            if ($request->has($key) && $request->$key) {

                $selectedFeatures[] = $feature;

            }
        }

        try {

            $data = [
                "room_number" => $validatedDate['room_number'],
                "room_category_id" => $validatedDate['room_category_id'],
                "type" => $validatedDate['type'],
                "capacity" => $validatedDate['capacity'],
                "price" => $validatedDate['price'],
                "description" => $validatedDate['description'],
                "image" => $save_url ?? null,
                'features' => json_encode($selectedFeatures),
                "bed" => (int) $validatedDate['bed'],
                "bathroom" => (int) $validatedDate['bathroom'],
                "short_description" => $validatedDate['short_description'],
            ];

            Rooms::Edit($room_id, $data);

            return redirect()->route('rooms')->with('mssg', 'Room Updated Successfully');

        } catch (\Exception $e) {
            \Log::error('Room update failed: ' . $e->getMessage(), ['exception' => $e]);
            return back()->with('error', 'Room Not Updated, Something Unexpected Went Wrong!');

        }

    }//End Method

    public function EditRoomDetails($id)
    {

        $room_id = $id;
        $room = Rooms::findorFail($room_id);

        return view("Dashboard.Admin.Rooms.edit-room-details", compact('room'));

    }//End Method

    public function Rooms()
    {

        $rooms = Rooms::all();
        $bookedRooms = Rooms::where('is_available', 0)->get();
        $avaliableRooms = Rooms::where('is_available', 1)->get();

        // json_decode($room->image);

        return view('Dashboard.Admin.Rooms.all_rooms', compact('rooms', 'avaliableRooms', 'bookedRooms'));

    }//End Method

    public function StoreRoomDetails(Request $request)
    {

        // dd($request->all());

        $images = $request->file('images');
        $image = [];

        $request->validate([

            "room_number" => ['required'],
            "room_category_id" => ['required'],
            "type" => ['required'],
            "capacity" => ['required'],
            "price" => ['required'],
            "description" => ['required'],
            "images" => ['required'],
            "bed" => ['numeric', 'required'],
            "bathroom" => ['numeric', 'required'],
            "short_description" => ['required'],

        ]);

        // dd('$images');

        foreach ($images as $img) {

            $uploadResult = self::Upload_File($img, 384, 420, "rooms");

            if (!$uploadResult) {

                return back()->with('mssg', 'File upload failed. Please try again.');

            }

            $image[] = $uploadResult;

        }

        $save_url = json_encode($image);

        $features = [
            'swim' => [
                'name' => 'Swimming Pool',
                'icon' => '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 23.6968C2.91 22.8485 5.08999 22.8485 7.00004 23.6968C8.90999 24.5451 11.09 24.5451 13 23.6968C14.91 22.8485 17.09 22.8485 19 23.6968C20.91 24.5451 23.09 24.5451 25 23.6968C26.91 22.8485 29.09 22.8485 31 23.6968" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M9.33203 9.3335H22.6653" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M9.33203 16H22.6653" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M22.666 19.3333V3.5C22.666 2.12 23.786 1 25.166 1C26.546 1 27.666 2.12 27.666 3.5" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M9.33203 19.3333V3.5C9.33203 2.12 10.452 1 11.832 1C13.212 1 14.332 2.12 14.332 3.5" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M1 30.3631C2.91 29.5147 5.08999 29.5147 7.00004 30.3631C8.90999 31.2114 11.09 31.2114 13 30.3631C14.91 29.5147 17.09 29.5147 19 30.3631C20.91 31.2114 23.09 31.2114 25 30.3631C26.91 29.5147 29.09 29.5147 31 30.3631" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>'
            ],
            'wifi' => [
                'name' => 'Wifi',
                'icon' => '<svg width="34" height="26" viewBox="0 0 34 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M17 24.8168L17.0167 24.7983" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M1 6.39997C10.6 -0.79999 23.4 -0.79999 33 6.39997" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M5.79883 12.7997C12.1989 7.99971 21.7989 7.99971 28.1988 12.7997" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M11.4004 18.4C15.0011 16.1599 19.0001 16.1593 22.6005 18.4" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>'
            ],
            'food' => [
                'name' => 'Lunch & Breakfast',
                'icon' => '<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M20.6672 20.9999V19.3332C20.6672 16.5716 18.4289 14.3333 15.6673 14.3333H7.33396C4.57231 14.3333 2.33398 16.5716 2.33398 19.3332V20.9999" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M17.3339 31H5.6673C3.82565 31 2.33398 29.5084 2.33398 27.6667V26H20.6672V27.6667C20.6672 29.5084 19.1755 31 17.3339 31Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M0.666016 21H22.3326" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M15.1379 14.3329L14.5029 9.5529C14.3712 8.55296 15.1479 7.66626 16.1562 7.66626H30.6645C31.6795 7.66626 32.4578 8.56462 32.3145 9.5679L29.4578 29.5679C29.3395 30.3895 28.6361 30.9995 27.8078 30.9995H24.2528" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M29.2517 1H25.6901C24.8634 1 24.1634 1.60499 24.0417 2.42166L23.2617 7.66664" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>'
            ],
            'fitness' => [
                'name' => 'Fitness Center',
                'icon' => '<svg width="38" height="18" viewBox="0 0 38 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M11.8645 1H6.49729C6.17195 1 5.9082 1.26381 5.9082 1.58909V16.7744C5.9082 17.0998 6.17195 17.3635 6.49729 17.3635H11.8645C12.1898 17.3635 12.4536 17.0998 12.4536 16.7744V1.58909C12.4536 1.26381 12.1898 1 11.8645 1Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M31.5032 1H26.136C25.8106 1 25.5469 1.26381 25.5469 1.58909V16.7744C25.5469 17.0998 25.8106 17.3635 26.136 17.3635H31.5032C31.8285 17.3635 32.0923 17.0998 32.0923 16.7744V1.58909C32.0923 1.26381 31.8285 1 31.5032 1Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M1 13.502V4.86203C1 4.53676 1.26374 4.27295 1.58909 4.27295H5.31996C5.6453 4.27295 5.90905 4.53676 5.90905 4.86203V13.502C5.90905 13.8273 5.6453 14.091 5.31996 14.091H1.58909C1.26374 14.091 1 13.8273 1 13.502Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M37.0008 13.502V4.86203C37.0008 4.53676 36.7371 4.27295 36.4118 4.27295H32.6809C32.3555 4.27295 32.0918 4.53676 32.0918 4.86203V13.502C32.0918 13.8273 32.3555 14.091 32.6809 14.091H36.4118C36.7371 14.091 37.0008 13.8273 37.0008 13.502Z" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M12.4531 9.18164H25.5439" stroke="#141414" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>'
            ],
        ];

        $selectedFeatures = [];

        foreach ($features as $key => $feature) {

            if ($request->has($key) && $request->$key) {

                $selectedFeatures[] = $feature;

            }
        }

        $data = [
            'room_number' => $request->room_number,
            'room_category_id' => $request->room_category_id,
            'type' => $request->type,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $save_url,
            'features' => json_encode($selectedFeatures),
            "bed" => (int) $request->bed,
            "bathroom" => (int) $request->bathroom,
            "short_description" => $request->short_description,
        ];

        // dd($data);

        $query = Rooms::Add($data);

        if ($query) {

            return redirect()->route('rooms')->with('mssg', 'Room Added Successfully.');

        } else {

            return back()->with('mssg', $query);

        }

    }//End Method

    public function AddRoomDetails()
    {

        $room_numbers = Rooms::pluck('room_number');
        $room_category = RoomCategory::latest()->get();

        return view('Dashboard.Admin.Rooms.add-room-details', compact('room_numbers', 'room_category'));
    }//End Method

    private function Upload_File($file, $w, $h, $path)
    {

        if ($file) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $img = $manager->read($file);
            $img = $img->resize($w, $h);
            // $img->toJpeg(100)->save(base_path('public/uploads/' . $path . '/' . $name_gen));
            if ($file->getClientOriginalExtension() === 'png') {
                // Save as PNG to preserve transparency
                $img->save(base_path('public/uploads/' . $path . '/' . $name_gen), 100);
            } else {
                // Convert to JPEG for other formats
                $img->toJpeg(100)->save(base_path('public/uploads/' . $path . '/' . $name_gen));
            }
            $save_url = 'uploads/' . $path . '/' . $name_gen;

            return $save_url;
        }
    } //End Method

    private function Unlink_Prev_image($id)
    {

        $room = Rooms::findorFail($id);

        $prev_images = json_decode($room->image);

        foreach ($prev_images as $img) {

            unlink($img);

        }

    }//End Method

}
