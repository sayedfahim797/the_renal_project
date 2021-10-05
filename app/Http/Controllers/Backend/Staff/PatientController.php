<?php

namespace App\Http\Controllers\Backend\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Staff\Patient;
use Auth;
use App\Http\Requests\Backend\Staff\PatientRequest;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('staff');
    }

    public function index()
    {
        $data['allData'] = Patient::where('create_by', Auth::user()->id)->get();
        return view('backend.staff.pages.patient.view_patient', $data);
    }

    public function create()
    {
        // dd('ok');
        return view('backend.staff.pages.patient.create_patient');
    }

    public function store(Request $request)
    {
        $request->validate([
                'mobile' => 'unique:patients',
                'email' => 'unique:patients',
            ],
            [ 'mobile.unique' => 'The Patient mobile  has already been taken !',
              'email.unique' => 'The Patient email  has already been taken !'
            ]);

        $patient = new Patient;  
        $patient->name = ucwords($request->name);
        $patient->email = $request->email;
        $patient->mobile = $request->mobile;
        $patient->gender = $request->gender;
        $patient->dob = date('Y-m-d', strtotime($request->dob));
        $patient->address = $request->address;
        $patient->create_by = Auth::user()->id;
        $patient->save(); 
        $notification = array(
                'message' => 'Successfully Patient Insert!',
                'alert-type' => 'success');
        return Redirect()->route('viewPatients')->with($notification);    
    }

    public function edit($id)
    {
        $data['allData'] = Patient::where('id', $id)->first();
        return view('backend.staff.pages.patient.edit_patient', $data);
    }

    public function update(PatientRequest $update,$id)
    {   
        $patient = Patient::findorfail($id);  
        $patient->name = ucwords($update->name);
        $patient->email = $update->email;
        $patient->mobile = $update->mobile;
        $patient->gender = $update->gender;
        $patient->dob = date('Y-m-d', strtotime($update->dob));
        $patient->address = $update->address;
        $patient->update_by = Auth::user()->id;
        $patient->save();
        $notification = array(
                'message' => 'Successfully Patient Update!',
                'alert-type' => 'success');
        return Redirect()->route('viewPatients')->with($notification);
    }

    public function destroy($id)
    {       
        $patient = Patient::findorfail($id);
        $patient->delete();
        $notification = array(
                'message' => 'Successfully Patient Delete!',
                'alert-type' => 'success');
        return Redirect()->back()->with($notification);        
    }
}
