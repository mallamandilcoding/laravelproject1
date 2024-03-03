<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    //
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function profile(){
        $id= Auth::user()->id;
        $adminData = User::findOrFail($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function editProfile(){
        $id= Auth::user()->id;
        $adminData = User::findOrFail($id);
        return view('admin.admin_edit_profile',compact('adminData'));
    }

    public function storeProfile(Request $request){
        $id= Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->file('image-select')) {
            $file = $request->file('image-select');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload_image/admin'),$filename);
            $data->profile_img = $filename;

        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
}
