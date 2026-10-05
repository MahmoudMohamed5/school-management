<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit' ,compact('user'));
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required|in:Male,Female',
        ]);
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;

        $image = $request->file('image');
        if ($image) {
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = time() . '.' . $ext;
            $upload_path = 'upload/user_images/';
            $image_url = $upload_path . $image_full_name;
            $image->move($upload_path, $image_full_name);
            if ($user->image) {
                @unlink($user->image);
            }
            $user->image = $image_url;
        }
        $notification = [
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success',
        ];
        $user->save();
        return redirect()->route('profile.index')->with($notification);
    }

    public function removeImage()
    {
        $user = Auth::user();
        if ($user->image) {
            unlink($user->image);
            $user->image = null;
            $user->save();
        }
        $notification = [
            'message' => 'User Profile Image Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
