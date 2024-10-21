<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SystemSettingsController extends Controller
{

    public function SaveSettings(Request $request)
    {

        $validatedData = $request->validate([

            "name" => ['required'],
            "email" => ['required'],
            "phone" => ['required'],
            "address" => ['required'],
            "facebook" => ['required'],
            "twitter" => ['required'],
            "instagram" => ['required']

        ]);

        if ($request->hasFile('logo')) {

            $logo = $request->file('logo');

            $logo_url = self::Upload_File($logo, 1101, 240, "settings");

            self::Unlink_Prev_image('logo');

        }

        if ($request->hasFile('favicon')) {

            $favicon = $request->file('favicon');

            $favicon_url = self::Upload_File($favicon, 40, 30, "settings");

            self::Unlink_Prev_image('favicon');

        }

        try {

            $data = [

                "name" => $validatedData['name'],
                "email" => $validatedData['email'],
                "phone" => $validatedData['phone'],
                "address" => $validatedData['address'],
                "facebook" => $validatedData['facebook'],
                "twitter" => $validatedData['twitter'],
                "instagram" => $validatedData['instagram'],
                "logo" => $logo_url ?? null,
                "favicon" => $favicon_url ?? null

            ];

            $saveSettings = SystemSetting::Savesettings($data);

            if ($saveSettings) {

                return back()->with('mssg', 'Settings Saved Successfully');

            } else {

                throw new \Exception('Failed to process your request');

            }

        } catch (\Exception $e) {

            return back()->with('error', $e->getMessage());

        }

    }//End Method

    public function Settings()
    {

        $settings = SystemSetting::findOrFail(1);

        return view('Dashboard.Admin.system_settings', compact('settings'));

    }//End Method

    private function Upload_File($file, $h, $w, $path)
    {

        if ($file) {

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $img = $manager->read($file);
            $img = $img->resize($h, $w);
            $img->toJpeg(80)->save(base_path('public/uploads/' . $path . '/' . $name_gen));
            $save_url = 'uploads/' . $path . '/' . $name_gen;

            return $save_url;
        }
    } //End Method

    private function Unlink_Prev_image($item)
    {

        $settings = SystemSetting::findorFail(1);

        $prev_item = $settings->$item;

        $basePath = base_path('public/');

        // Check if file exists before deleting
        if ($prev_item && file_exists($basePath . $prev_item)) {
            unlink($basePath . $prev_item);
        }

    }//End Method

}
