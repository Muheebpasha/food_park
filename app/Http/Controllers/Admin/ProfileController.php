<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\Admin\ProfilePasswordUpdate;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    use FileUploadTrait;

    function index() :View
    {
        return view('admin.profile.index');
    }

    function updateProfile(ProfileUpdateRequest $request) : RedirectResponse
    {
        //dd($request->all());
        $user = Auth::user();
        $image_path = $this->uploadImage($request,'avatar');
        // dd($image_path);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = isset($image_path) ? $image_path : $user->avatar;
        $user->save();
        toastr('Updated Successfully!','success');
        return redirect()->back();
    }

    function updatePassword(ProfilePasswordUpdate $request) :RedirectResponse
    {

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        toastr()->success('Password Updated Successfully');
        return redirect()->back();
    }
}
