<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\EmployeeDept;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //All Dept
    public function AllDept()
    {
        $depts = EmployeeDept::latest()->get();
        $admins = Admin::where('status', '1')->orderBy('name', 'ASC')->latest()->get();

        return view('admin.pages.dept.all_dept', compact('depts', 'admins'));
    }

    //Store Dept
    public function StoreDept(Request $request)
    {
        $validator = $request->validate(

            [
                'name' => 'required|max:255'
            ],

            [
                'name.required' => 'Department Name is required',
            ],
        );

        if ($validator) {


            EmployeeDept::insert([

                'name' => $request->name,
                'slug' => strtolower(str_replace('', '-', $request->name)),
                'supervisor_id' => $request->supervisor_id,
                'created_at' => now(),

            ]);

            toastr()->success('Department Created Successfully');
            return redirect()->route('all.dept');
        }
    }

    //Update Dept
    public function UpdateDept(Request $request)
    {
        $uid = $request->id;

        $validator = $request->validate(

            [
                'name' => 'required|max:255'
            ],

            [
                'name.required' => 'Department Name is required',
            ],
        );

        if ($validator) {


            EmployeeDept::findOrFail($uid)->update([

                'name' => $request->name,

                'supervisor_id' => $request->supervisor_id,
                'created_at' => now(),

            ]);

            toastr()->success('Department Update Successfully');
            return redirect()->route('all.dept');
        }

    }

    //DeleteDept
    public function DeleteDept($id)
    {

        EmployeeDept::find($id)->delete();

        toastr()->success('Department Delete Successfully');

        return redirect()->route('all.dept');
    }


}
