<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Admin\Branch;
use App\Http\Requests\Backend\Admin\BranchRequest;

class BranchController extends Controller
{
    public function index()
    {
        $data['allData'] = Branch::all();
        return view('backend.admin.pages.branch.view_branch', $data);
    }

    public function create()
    {
        // dd('ok');
        return view('backend.admin.pages.branch.create_branch');
    }

    public function store(Request $request)
    {
        $request->validate([
                'name' => 'unique:branches',
                'amount' => 'numeric',
            ],
            [ 'name.unique' => 'The Branch name has already been taken !'
            ]);

        $branch = new Branch;     
        $branch->name = $request->name;
        $branch->amount = $request->amount;
        $branch->save();

        if ($branch) {
            $notification = array(
                'message' => 'Successfully Branch Insert !',
                'alert-type' => 'success');
            return Redirect()->route('viewBranches')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went worng !',
                'alert-type' => 'error');
            return Redirect()->back()->with($notification);
        } 
    }

    public function edit($id)
    {
        $data['allData'] = Branch::where('id', $id)->first();
        return view('backend.admin.pages.branch.edit_branch', $data);
    }

    public function update(BranchRequest $update,$id)
    {   
        $branch = Branch::findorfail($id);   
        $branch->name =$update->name;
        $branch->amount =$update->amount;
        $branch->save();

        if ($branch) {
            $notification = array(
                'message' => 'Successfully Branch Update !',
                'alert-type' => 'success');
            return Redirect()->route('viewBranches')->with($notification);
        } else {
            $notification = array(
                'message' => 'Successfully Branch Update !',
                'alert-type' => 'success');
            return Redirect()->route('viewBranches')->with($notification);
        }
    }

    public function destroy($id)
    {

        $delete=Branch::find($id);
        $delete->delete();

        if ($delete) {
           
            $notification = array(
                'message' => 'Successfully Branch Delete !',
                'alert-type' => 'success');
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went worng !',
                'alert-type' => 'error');
            return Redirect()->back()->with($notification);
        }
       
    }
}
