<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Http\Requests\Backend\Admin\AdminRequest;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $data['allData'] = User::where('role_id', '3')->get();
        return view('backend.admin.pages.admin.view_admin', $data);
    }

    public function create()
    {
        // dd('ok');
        return view('backend.admin.pages.admin.create_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
                'mobile' => 'unique:users',
                'email' => 'unique:users',
            ],
            [ 'mobile.unique' => 'The user mobile  has already been taken !',
              'email.unique' => 'The user email  has already been taken !'
            ]);

        // $this->validate($request, [
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     ]);

        $user = new User;  
        $user->role_id = $request->role_id;
        $user->name = ucwords($request->name);
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $image=$request->file('photo');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $imgName=$image_name.'.'.$ext;
            $image->move(public_path('upload/user_images/'), $imgName);
            $user->photo = $imgName;
        }
        $user->save(); 
        $notification = array(
                'message' => 'Successfully Admin Insert!',
                'alert-type' => 'success');
        return Redirect()->route('viewAdmins')->with($notification);    
    }

    public function edit($id)
    {
        $data['allData'] = User::where('id', $id)->first();
        return view('backend.admin.pages.admin.edit_admin', $data);
    }

    public function update(AdminRequest $update,$id)
    {   
        $user = User::findorfail($id);
        $user->name = ucwords($update->name);
        $user->email = $update->email;
        $user->mobile = $update->mobile;
        $image = $update->file('photo');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $imgName=$image_name.'.'.$ext;
            $image->move(public_path('upload/user_images/'), $imgName);
            if (file_exists('public/upload/user_images/'.$user->images) AND ! empty($user->images)) {
                unlink('public/upload/user_images/'.$user->images);
            }
            $user->photo = $imgName;
        }
        $user->save();
        $notification = array(
                'message' => 'Successfully Admin Update!',
                'alert-type' => 'success');
        return Redirect()->route('viewAdmins')->with($notification);
    }

    public function destroy($id)
    {       
        $user = User::findorfail($id);
        if (file_exists('public/upload/user_images/'.$user->photo) AND ! empty($user->photo)) {
                unlink('public/upload/user_images/'.$user->photo);
            }
        $user->delete();
        $notification = array(
                'message' => 'Successfully Admin Delete!',
                'alert-type' => 'success');
        return Redirect()->back()->with($notification);        
    }
}
