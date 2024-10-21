<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Drivers\Gd\Driver;

class AdminAuthController extends Controller
{

    public function Logout()
    {

        Auth::guard('admin')->logout();

        return redirect()->route("admin.login")->with('mssg', 'You Have Been Logged Out');

    }//End Method

    public function UpdateAdminPassword(Request $request)
    {

        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);


        $admin = Auth::guard('admin')->user();


        if (!Hash::check($validated['current_password'], $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect'])->withInput();
        }

        try {

            $admin->update([
                'password' => Hash::make($validated['password']),
            ]);

            return back()->with('mssg', 'Password updated successfully!');

        } catch (\Exception $e) {

            \Log::error('Password update failed: ' . $e->getMessage());

            return back()->with('error', 'Something went wrong. Please try again.');

        }

    }//End Method

    public function UpdateAdminInfo(Request $request)
    {

        $validatedData = $request->validate([

            "address" => ['required'],
            "phone" => ['required', 'numeric'],
            "bio" => ['required'],
            "id" => ['required']

        ]);

        try {

            $data = [
                "address" => $validatedData['address'],
                "phone" => $validatedData['phone'],
                "bio" => $validatedData['bio']
            ];

            $updateInfo = Admin::EditInfo($validatedData['id'], $data);

            if ($updateInfo) {

                return back()->with('mssg', 'Your Info Has Been Updated.');

            } else {

                throw new \Exception('Failed to update admin info.');

            }

        } catch (\Exception $e) {

            return back()->with('error', $e->getMessage());

        }

    }//End Method

    public function UpdateProfileImage(Request $request)
    {

        $validateData = $request->validate([
            'image' => ['required', 'file']
        ]);

        $img = $request->file('image');

        try {

            $image = self::Upload_File($img, 150, 150, "admins");
            $admin = Admin::findorFail($request->id);
            unlink($admin->image);
            $admin->image = $image;
            $admin->update();

            return back()->with('mssg', 'Your Profile Image Has Been Updated Successfully');

        } catch (\Exception $e) {

            return back()->with('error', 'Something went Wrong');

        }
    }//End Method

    public function profile()
    {

        $admin = Auth::guard('admin')->user();

        return view('Dashboard.Admin.profile', compact('admin'));

    }//End Method

    public function Index()
    {

        return view('Dashboard.Admin.index');

    }//End Method

    public function Main()
    {

        return view('Dashboard.Admin.auth.login');

    }//End Method

    public function Login(Request $request)
    {

        $request->validate([

            "email" => ["required", "email"],
            "password" => ["required"],

        ], [

            "email.required" => "Email is required",
            "password.required" => "Password is required",

        ]);

        $check = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {

            return redirect()->intended(route('admin.dashboard'))
                ->with('mssg', 'You have successfully logged in.');

        } else {

            return back()->with('mssg', 'Invalid Email or Password');

        }

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

}
