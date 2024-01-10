<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfilePasswordUpdateRequest;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;

class ProfileController extends Controller
{
    use FileUploadTrait;
    function updateProfile(ProfileUpdateRequest $request) : RedirectResponse
    {
        //dd($request->all());
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr()->success('Profile Updated Successfully!');
        return redirect()->back();
    }

    function updatePassword(ProfilePasswordUpdateRequest $request) : RedirectResponse
    {
        // dd($request->all());
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr()->success('Password Updated Successfully');
        return redirect()->back();
    }

    function updateAvatar(Request $request)
    {
        $imagePath = $this->uploadImage($request,'avatar');
        $user = Auth::user();
        $user->avatar = $imagePath;
        $user->save();
        //toastr()->success('Avatar Updated Successfully');
        return response(['status' => 'success', 'message' => 'Avatar Updated Successfully']);
    }
}
