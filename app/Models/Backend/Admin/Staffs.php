<?php

namespace App\Models\Backend\Admin;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Staffs extends Model
{
    public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
