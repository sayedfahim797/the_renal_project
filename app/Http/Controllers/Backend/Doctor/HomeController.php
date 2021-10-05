<?php

namespace App\Http\Controllers\Backend\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Staff\Patient;
use Carbon\Carbon;

class HomeController extends Controller
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
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=Patient::select('id','created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('d-m-Y');
        });

        $days=[];
        $dayCount=[];
        foreach($data as $month => $values){
            $days[]=$month;
            $dayCount[]=count($values);
        }
        return view('backend.doctor.index',['data'=>$data,'days'=>$days,'dayCount'=>$dayCount]);
    }
}
