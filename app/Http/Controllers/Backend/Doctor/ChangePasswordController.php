<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('doctor');
    }

    public function index()
    {
        return view('backend.doctor.pages.password_change.password_change');
    }

    public function update(Request $request)
    {
       
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

        $password=Auth::user()->password;
        $oldpass=$request->oldpass;

        if (Hash::check($oldpass, $password)) {
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => 'Successfully Password Change, Now Log In !',
                'alert-type' => 'success');
            return Redirect()->route('login')->with($notification);
        }else{

            return Redirect()->back();
        }
    }
}
