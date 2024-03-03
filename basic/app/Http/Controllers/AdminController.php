<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function destroy(Request $request): RedirectResponse
    {
        // $id= Auth::user()->id;
        // $adminData = User::findOrFail($id);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();



        $notification = array(
            'message' => ' logged out',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);


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
            'message' => ' Profile Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function changePassword(){
        $id= Auth::user()->id;
        $adminData = User::findOrFail($id);
        return view('admin.admin_change_password',compact('adminData'));
    }

    public function updatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->newpassword);
            $user->save();

            session()->flash('message','password updated successfully');
            return redirect()->back();
        }else{
            session()->flash('message','old password not match');
            return redirect()->back();
        }
    }
}
