<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(EmployeeDept::class, 'employee_department_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(EmployeeCategory::class, 'employee_category_id', 'id');
    }

}
