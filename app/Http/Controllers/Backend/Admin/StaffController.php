<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use DB;
use App\Http\Requests\Backend\Admin\StaffRequest;
use App\Models\Backend\Admin\Branch;
use App\Models\Backend\Admin\Staffs;

class StaffController extends Controller
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
        $data['allData'] = Staffs::get();
        return view('backend.admin.pages.staff.view_staff', $data);
    }

    public function create()
    {
        // dd('ok');
        $data['allBranch'] = Branch::get();
        return view('backend.admin.pages.staff.create_staff', $data);
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

        DB::transaction(function() use($request, $user) {
            if ($user->save()) {
                $staff = new Staffs();
                $staff->branch_id = $request->branch_id;
                $staff->user_id = $user->id;
                $staff->save();
            }
        }); 
        $notification = array(
                'message' => 'Successfully Staff Insert!',
                'alert-type' => 'success');
        return Redirect()->route('viewStaffs')->with($notification);    
    }

    public function edit($id)
    {
        $data['allData'] = Staffs::where('id', $id)->first();
        $data['allBranch'] = Branch::get();
        return view('backend.admin.pages.staff.edit_staff', $data);
    }

    public function update(StaffRequest $update,$id)
    {   
        $staff = Staffs::findorfail($id);
        $staff->branch_id = $update->branch_id;
        DB::transaction(function() use($update, $staff) {
            if ($staff->save()) {
                $user = User::findorfail($staff->user_id);
                $user->role_id = $update->role_id;
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
            }
        });
        $notification = array(
                'message' => 'Successfully Staff Update!',
                'alert-type' => 'success');
        return Redirect()->route('viewStaffs')->with($notification);
    }

    public function destroy($id)
    {   
        $staffs=Staffs::find($id);
        $staffs->delete();
        $user = User::findorfail($staffs->user_id);
        if (file_exists('public/upload/user_images/'.$user->photo) AND ! empty($user->photo)) {
                unlink('public/upload/user_images/'.$user->photo);
            }
        User::where('id', $user->id)->delete();
        $notification = array(
                'message' => 'Successfully Staff Delete!',
                'alert-type' => 'success');
        return Redirect()->back()->with($notification);        
    }
}
