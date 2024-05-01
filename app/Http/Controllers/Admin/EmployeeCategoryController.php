<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\EmployeeCategory;
use Illuminate\Http\Request;

class EmployeeCategoryController extends Controller
{
    //All Employee Category
    public function AllEmployeeCategory()
    {
        $employcats = EmployeeCategory::latest()->get();

        return view('admin.pages.employeecat.all_employee_cat', compact('employcats'));
    }

    //Store Employee Category
    public function StoreEmployeeCategory(Request $request)
    {
        $validator = $request->validate(

            [
                'name' => 'required|max:255',
                'evaluation_period' => 'required',
                'total_leave' => 'required',
            ],

            [
                'name.required' => 'Employee Name is required',
                'evaluation_period.required' => 'Evaluation Period is required',
                'total_leave.required' => 'Total Leave is required',
            ],
        );

        if ($validator) {


            EmployeeCategory::insert([

                'name' => $request->name,
                'slug' => strtolower(str_replace('', '-', $request->name)),

                'evaluation_period' => $request->evaluation_period,
                'total_leave' => $request->total_leave,
                'monthly_earned_leave' => $request->monthly_earned_leave,
                'monthly_earned_leave_availability_duration' => $request->monthly_earned_leave_availability_duration,
                'monthly_casual_leave' => $request->monthly_casual_leave,
                'monthly_casual_leave_availability_duration' => $request->monthly_casual_leave_availability_duration,
                'monthly_medical_leave' => $request->monthly_medical_leave,
                'monthly_medical_leave_availability_duration' => $request->monthly_medical_leave_availability_duration,


                'yearly_earned_leave' => $request->yearly_earned_leave,
                'yearly_casual_leave' => $request->yearly_casual_leave,
                'yearly_medical_leave' => $request->yearly_medical_leave,


                'created_at' => now(),

            ]);

            toastr()->success('mployee Category Created Successfully');
            return redirect()->route('all.employcat');
        }
    }

    //Update Employee Category
    public function UpdateEmployeeCategory(Request $request)
    {
        $uid = $request->id;

        $validator = $request->validate(

            [
                'name' => 'required|max:255',
                'evaluation_period' => 'required',
                'total_leave' => 'required',
            ],

            [
                'name.required' => 'Employee Name is required',
                'evaluation_period.required' => 'Evaluation Period is required',
                'total_leave.required' => 'Total Leave is required',
            ],
        );

        if ($validator) {


            EmployeeCategory::findOrFail($uid)->update([

                'name' => $request->name,
                'slug' => strtolower(str_replace('', '-', $request->name)),

                'evaluation_period' => $request->evaluation_period,
                'total_leave' => $request->total_leave,
                'monthly_earned_leave' => $request->monthly_earned_leave,
                'monthly_earned_leave_availability_duration' => $request->monthly_earned_leave_availability_duration,
                'monthly_casual_leave' => $request->monthly_casual_leave,
                'monthly_casual_leave_availability_duration' => $request->monthly_casual_leave_availability_duration,
                'monthly_medical_leave' => $request->monthly_medical_leave,
                'monthly_medical_leave_availability_duration' => $request->monthly_medical_leave_availability_duration,


                'yearly_earned_leave' => $request->yearly_earned_leave,
                'yearly_casual_leave' => $request->yearly_casual_leave,
                'yearly_medical_leave' => $request->yearly_medical_leave,




            ]);

            toastr()->success('Employee Category Update Successfully');
            return redirect()->route('all.employcat');
        }
    }

    //Delete Employee Category
    public function DeleteEmployeeCategory($id)
    {

        EmployeeCategory::find($id)->delete();

        toastr()->success('Employee Category Delete Successfully');

        return redirect()->route('all.employcat');
    }
}
