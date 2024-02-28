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
}
