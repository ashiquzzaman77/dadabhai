<?php

namespace App\Models\Admin;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDept extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supervisor()
    {
        return $this->belongsTo(Admin::class,'supervisor_id','id');
    }
}
