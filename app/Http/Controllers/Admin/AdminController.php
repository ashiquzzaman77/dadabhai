<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\EmployeeCategory;
use App\Models\Admin\EmployeeDept;
use App\Models\Admin\EmployeeInformation;
use App\Models\User\Order;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    //Admin Dashboard
    public function AdminDashboard()
    {
        $orders = Order::where('status','pending')->latest()->get();
        
        return view('admin.index',compact('orders'));
    }

    //AdminProfile
    public function AdminProfile()
    {
        $id = Auth::guard('admin')->user()->id;
        $profileData = Admin::find($id);

        $roles = Role::latest()->get();

        return view('admin.pages.profile.admin_profile', compact('profileData', 'roles'));
    }

    //AdminProfileUpdate
    public function AdminProfileUpdate(Request $request)
    {

        $id = Auth::guard('admin')->user()->id;
        $update = Admin::findOrFail($id);

        $update->name = $request->name;
        $update->username = $request->username;
        $update->company_name = $request->company_name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->designation = $request->designation;
        $update->biometric_id = $request->biometric_id;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $update->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            $update['photo'] = $filename;
        }

        $update->save();

        toastr()->success('Profile Update Succeesfully');

        return redirect()->back();
    }

    //Admin Account Update
    public function AdminAccountUpdate(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;
        $update = Admin::findOrFail($id);

        $update->facebook = $request->facebook;
        $update->youtube = $request->youtube;
        $update->twitter = $request->twitter;
        $update->linkedin = $request->linkedin;

        $update->save();

        toastr()->success('Admin Account Update Succeesfully');

        return redirect()->back();
    }

    //Admin Password
    public function AdmiPasswordPage()
    {
        $id = Auth::guard('admin')->user()->id;
        $profileData = Admin::find($id);

        return view('admin.pages.profile.admin_password', compact('profileData'));
    }

    //Admin Password Update
    public function AdminPasswordUpdateSubmit(Request $request)
    {
        //validate
        $request->validate([

            'old_password' => 'required',
            'new_password' => [

                'required', 'confirmed', Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers(),

            ],
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {

            toastr()->error('Old Password Not Match!');

            return redirect()->back();
        }

        //Update New Password
        Admin::whereId(Auth::guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        toastr()->success('Password Change Succeesfully');

        return redirect()->back();
    }

    //AllEmployee Details
    public function AllEmployeeDetails()
    {
        $id = Auth::guard('admin')->user()->id;
        $employs = EmployeeInformation::where('admin_id', $id)->get();

        $employeeCategories = EmployeeCategory::orderBy('name', 'ASC')->latest()->get();
        $employeeDepartments = EmployeeDept::orderBy('name', 'ASC')->latest()->get();

        return view('admin.pages.profile.all_employee_details', compact('employeeCategories', 'employeeDepartments', 'employs'));
    }

    //Add Employee Details
    public function AddEmployeeDetails()
    {
        $employeeCategories = EmployeeCategory::orderBy('name', 'ASC')->latest()->get();
        $employeeDepartments = EmployeeDept::orderBy('name', 'ASC')->latest()->get();

        return view('admin.pages.profile.add_employee_details', compact('employeeCategories', 'employeeDepartments'));
    }

    //Store Employee Details
    public function StoreEmployeeDetails(Request $request)
    {

        $mainFileSign = $request->sign;
        $filePathSign = storage_path('app/public/employee/sign/');

        $mainFileCeoSign = $request->file('ceo_sign');
        $filePathCeoSign = storage_path('app/public/employee/ceosign/');

        $mainFileOperationDirectorSign = $request->file('operation_director_sign');
        $filePathOperationDirectorSign = storage_path('app/public/employee/operationsign/');

        $mainFileManagingDirectorSign = $request->file('managing_director_sign');
        $filePathManagingDirectorSign = storage_path('app/public/employee/managingsign/');

        if (!empty($mainFileSign)) {
            $globalFunSign = Helper::customUpload($mainFileSign, $filePathSign);
        } else {
            $globalFunSign = ['status' => 0];
        }

        if (!empty($mainFileCeoSign)) {
            $globalFunCeoSign = Helper::customUpload($mainFileCeoSign, $filePathCeoSign);
        } else {
            $globalFunCeoSign = ['status' => 0];
        }

        if (!empty($mainFileOperationDirectorSign)) {
            $globalFunOperationDirectorSign = Helper::customUpload($mainFileOperationDirectorSign, $filePathOperationDirectorSign);
        } else {
            $globalFunOperationDirectorSign = ['status' => 0];
        }

        if (!empty($mainFileManagingDirectorSign)) {
            $globalFunManagingDirectorSign = Helper::customUpload($mainFileManagingDirectorSign, $filePathManagingDirectorSign);
        } else {
            $globalFunManagingDirectorSign = ['status' => 0];
        }

        EmployeeInformation::create([

            'admin_id' => Auth::guard('admin')->user()->id,

            'employee_department_id' => $request->employee_department_id,
            'employee_category_id' => $request->employee_category_id,

            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'postal' => $request->postal,
            'role' => $request->role,

            'total_years_of_job_experience' => $request->total_years_of_job_experience,
            'total_years_of_related_experience' => $request->total_years_of_related_experience,
            'total_years_of_related_education' => $request->total_years_of_related_education,
            'lowest_job_duration_in_past' => $request->lowest_job_duration_in_past,
            'highest_job_duration_in_past' => $request->highest_job_duration_in_past,
            'concern_with_social_work' => $request->concern_with_social_work,
            'what_turns_you_on_off' => $request->what_turns_you_on_off,
            'preference_in_professional_life' => $request->preference_in_professional_life,

            'action_in_negative_situation' => $request->action_in_negative_situation,
            'recent_job_info_one_company_name' => $request->recent_job_info_one_company_name,
            'recent_job_info_one_address' => $request->recent_job_info_one_address,
            'recent_job_info_one_designation' => $request->recent_job_info_one_designation,
            'recent_job_info_one_contact_no' => $request->recent_job_info_one_contact_no,
            'recent_job_info_one_duration' => $request->recent_job_info_one_duration,
            'recent_job_info_two_company_name' => $request->recent_job_info_two_company_name,
            'recent_job_info_two_address' => $request->recent_job_info_two_address,
            'recent_job_info_two_designation' => $request->recent_job_info_two_designation,
            'recent_job_info_two_contact_no' => $request->recent_job_info_two_contact_no,

            'recent_job_info_two_duration' => $request->recent_job_info_two_duration,
            'professional_reference_name' => $request->professional_reference_name,
            'professional_reference_address' => $request->professional_reference_address,
            'professional_reference_contact_no_one' => $request->professional_reference_contact_no_one,
            'professional_reference_contact_no_two' => $request->professional_reference_contact_no_two,
            'professional_reference_contact_relation' => $request->professional_reference_contact_relation,
            'relative_reference_name' => $request->relative_reference_name,
            'relative_reference_address' => $request->relative_reference_address,
            'relative_reference_contact_no_one' => $request->relative_reference_contact_no_one,
            'relative_reference_contact_no_two' => $request->relative_reference_contact_no_two,
            'relative_reference_contact_relation' => $request->relative_reference_contact_relation,

            'passing_year' => $request->passing_year,
            'university' => $request->university,
            'major_subjects' => $request->major_subjects,
            'other_training_information_technical_training' => $request->other_training_information_technical_training,
            'technical_training_duration_date' => $request->technical_training_duration_date,
            'other_training_information_certificate_course' => $request->other_training_information_certificate_course,
            'certificate_course_duration_date' => $request->certificate_course_duration_date,
            'academic_achievements' => $request->academic_achievements,
            'professional_achievements' => $request->professional_achievements,
            'social_achievements' => $request->social_achievements,
            'personal_achievements' => $request->personal_achievements,
            'permanent_address' => $request->permanent_address,

            'permanent_address_city' => $request->permanent_address_city,
            'permanent_address_state' => $request->permanent_address_state,
            'permanent_address_zip_code' => $request->permanent_address_zip_code,
            'current_address' => $request->current_address,
            'current_address_city' => $request->current_address_city,
            'current_address_state' => $request->current_address_state,
            'current_address_zip_code' => $request->current_address_zip_code,
            'alternate_email' => $request->alternate_email,
            'home_phone' => $request->home_phone,
            'emergency_number' => $request->emergency_number,
            'nid_bri_ppn' => $request->nid_bri_ppn,

            'birth_date' => $request->birth_date,
            'marital_status' => $request->marital_status,
            'spouse_name' => $request->spouse_name,
            'spouse_employer' => $request->spouse_employer,
            'spouse_work_phone' => $request->spouse_work_phone,
            'emergency_contact_information_name' => $request->emergency_contact_information_name,
            'emergency_contact_information_address' => $request->emergency_contact_information_address,
            'emergency_contact_information_city' => $request->emergency_contact_information_city,
            'emergency_contact_information_zip_code' => $request->emergency_contact_information_zip_code,
            'emergency_contact_information_phone' => $request->emergency_contact_information_phone,
            'emergency_contact_information_relationsip' => $request->emergency_contact_information_relationsip,
            'father_name' => $request->father_name,

            'mother_name' => $request->mother_name,
            'father_service' => $request->father_service,
            'mother_service' => $request->mother_service,
            'brothers_total' => $request->brothers_total,
            'sisters_total' => $request->sisters_total,
            'siblings_contact_info_one' => $request->siblings_contact_info_one,
            'siblings_contact_info_two' => $request->siblings_contact_info_two,
            'sign_date' => $request->sign_date,
            'evaluation_date' => $request->evaluation_date,

            'operation_director_sign' => $globalFunOperationDirectorSign['status'] == 1 ? $globalFunOperationDirectorSign['file_name'] : null,

            'managing_director_sign' => $globalFunManagingDirectorSign['status'] == 1 ? $globalFunManagingDirectorSign['file_name'] : null,

            // 'casual_leave_due_as_on' => $request->casual_leave_due_as_on,
            // 'casual_leave_availed' => $request->casual_leave_availed,
            // 'casual_balance_due' => $request->casual_balance_due,
            // 'earned_leave_due_as_on' => $request->earned_leave_due_as_on,
            // 'earned_leave_availed' => $request->earned_leave_availed,
            // 'earned_balance_due' => $request->earned_balance_due,
            // 'medical_leave_due_as_on' => $request->medical_leave_due_as_on,
            // 'medical_leave_availed' => $request->medical_leave_availed,
            // 'medical_balance_due' => $request->medical_balance_due,

            'police_verification' => $request->police_verification,
            'acknowledgement' => $request->acknowledgement,

            'sign' => $globalFunSign['status'] == 1 ? $globalFunSign['file_name'] : null,

            'ceo_sign' => $globalFunCeoSign['status'] == 1 ? $globalFunCeoSign['file_name'] : null,

        ]);

        toastr()->success('Employee Form Filled Successfully');
        return redirect()->back();
    }

    //Edit Employee Details
    public function EditEmployeeDetails($id)
    {
        $editEmployee = EmployeeInformation::find($id);

        $employeeCategories = EmployeeCategory::orderBy('name', 'ASC')->latest()->get();
        $employeeDepartments = EmployeeDept::orderBy('name', 'ASC')->latest()->get();

        return view('admin.pages.profile.edit_employee_details', compact('employeeCategories', 'employeeDepartments', 'editEmployee'));
    }

    //Update Employee Details
    public function UpdateEmployeeDetails(Request $request)
    {
        $uid = $request->id;
        $admins = EmployeeInformation::findOrFail($uid);

        $mainFileSign = $request->sign;
        $filePathSign = storage_path('app/public/employee/sign/');

        $mainFileCeoSign = $request->file('ceo_sign');
        $filePathCeoSign = storage_path('app/public/employee/ceosign/');

        $mainFileOperationDirectorSign = $request->file('operation_director_sign');
        $filePathOperationDirectorSign = storage_path('app/public/employee/operationsign/');

        $mainFileManagingDirectorSign = $request->file('managing_director_sign');
        $filePathManagingDirectorSign = storage_path('app/public/employee/managingsign/');

        if (!empty($mainFileSign)) {
            $globalFunSign = Helper::customUpload($mainFileSign, $filePathSign);

            $paths = [
                storage_path("app/public/employee/sign/{$admins->sign}"),
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        } else {
            $globalFunSign = ['status' => 0];
        }

        if (!empty($mainFileCeoSign)) {
            $globalFunCeoSign = Helper::customUpload($mainFileCeoSign, $filePathCeoSign);

            $paths = [
                storage_path("app/public/employee/ceosign/{$admins->ceo_sign}"),
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

        } else {
            $globalFunCeoSign = ['status' => 0];
        }

        if (!empty($mainFileOperationDirectorSign)) {
            $globalFunOperationDirectorSign = Helper::customUpload($mainFileOperationDirectorSign, $filePathOperationDirectorSign);

            $paths = [
                storage_path("app/public/employee/operationsign/{$admins->operation_director_sign}"),
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

        } else {
            $globalFunOperationDirectorSign = ['status' => 0];
        }

        if (!empty($mainFileManagingDirectorSign)) {
            $globalFunManagingDirectorSign = Helper::customUpload($mainFileManagingDirectorSign, $filePathManagingDirectorSign);

            $paths = [
                storage_path("app/public/employee/managingsign/{$admins->managing_director_sign}"),
            ];
            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

        } else {
            $globalFunManagingDirectorSign = ['status' => 0];
        }

        $admins->update([

            //'admin_id' => Auth::guard('admin')->user()->id,

            'employee_department_id' => $request->employee_department_id,
            'employee_category_id' => $request->employee_category_id,

            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'postal' => $request->postal,
            'role' => $request->role,

            'total_years_of_job_experience' => $request->total_years_of_job_experience,
            'total_years_of_related_experience' => $request->total_years_of_related_experience,
            'total_years_of_related_education' => $request->total_years_of_related_education,
            'lowest_job_duration_in_past' => $request->lowest_job_duration_in_past,
            'highest_job_duration_in_past' => $request->highest_job_duration_in_past,
            'concern_with_social_work' => $request->concern_with_social_work,
            'what_turns_you_on_off' => $request->what_turns_you_on_off,
            'preference_in_professional_life' => $request->preference_in_professional_life,

            'action_in_negative_situation' => $request->action_in_negative_situation,
            'recent_job_info_one_company_name' => $request->recent_job_info_one_company_name,
            'recent_job_info_one_address' => $request->recent_job_info_one_address,
            'recent_job_info_one_designation' => $request->recent_job_info_one_designation,
            'recent_job_info_one_contact_no' => $request->recent_job_info_one_contact_no,
            'recent_job_info_one_duration' => $request->recent_job_info_one_duration,
            'recent_job_info_two_company_name' => $request->recent_job_info_two_company_name,
            'recent_job_info_two_address' => $request->recent_job_info_two_address,
            'recent_job_info_two_designation' => $request->recent_job_info_two_designation,
            'recent_job_info_two_contact_no' => $request->recent_job_info_two_contact_no,

            'recent_job_info_two_duration' => $request->recent_job_info_two_duration,
            'professional_reference_name' => $request->professional_reference_name,
            'professional_reference_address' => $request->professional_reference_address,
            'professional_reference_contact_no_one' => $request->professional_reference_contact_no_one,
            'professional_reference_contact_no_two' => $request->professional_reference_contact_no_two,
            'professional_reference_contact_relation' => $request->professional_reference_contact_relation,
            'relative_reference_name' => $request->relative_reference_name,
            'relative_reference_address' => $request->relative_reference_address,
            'relative_reference_contact_no_one' => $request->relative_reference_contact_no_one,
            'relative_reference_contact_no_two' => $request->relative_reference_contact_no_two,
            'relative_reference_contact_relation' => $request->relative_reference_contact_relation,

            'passing_year' => $request->passing_year,
            'university' => $request->university,
            'major_subjects' => $request->major_subjects,
            'other_training_information_technical_training' => $request->other_training_information_technical_training,
            'technical_training_duration_date' => $request->technical_training_duration_date,
            'other_training_information_certificate_course' => $request->other_training_information_certificate_course,
            'certificate_course_duration_date' => $request->certificate_course_duration_date,
            'academic_achievements' => $request->academic_achievements,
            'professional_achievements' => $request->professional_achievements,
            'social_achievements' => $request->social_achievements,
            'personal_achievements' => $request->personal_achievements,
            'permanent_address' => $request->permanent_address,

            'permanent_address_city' => $request->permanent_address_city,
            'permanent_address_state' => $request->permanent_address_state,
            'permanent_address_zip_code' => $request->permanent_address_zip_code,
            'current_address' => $request->current_address,
            'current_address_city' => $request->current_address_city,
            'current_address_state' => $request->current_address_state,
            'current_address_zip_code' => $request->current_address_zip_code,
            'alternate_email' => $request->alternate_email,
            'home_phone' => $request->home_phone,
            'emergency_number' => $request->emergency_number,
            'nid_bri_ppn' => $request->nid_bri_ppn,

            'birth_date' => $request->birth_date,
            'marital_status' => $request->marital_status,
            'spouse_name' => $request->spouse_name,
            'spouse_employer' => $request->spouse_employer,
            'spouse_work_phone' => $request->spouse_work_phone,
            'emergency_contact_information_name' => $request->emergency_contact_information_name,
            'emergency_contact_information_address' => $request->emergency_contact_information_address,
            'emergency_contact_information_city' => $request->emergency_contact_information_city,
            'emergency_contact_information_zip_code' => $request->emergency_contact_information_zip_code,
            'emergency_contact_information_phone' => $request->emergency_contact_information_phone,
            'emergency_contact_information_relationsip' => $request->emergency_contact_information_relationsip,
            'father_name' => $request->father_name,

            'mother_name' => $request->mother_name,
            'father_service' => $request->father_service,
            'mother_service' => $request->mother_service,
            'brothers_total' => $request->brothers_total,
            'sisters_total' => $request->sisters_total,
            'siblings_contact_info_one' => $request->siblings_contact_info_one,
            'siblings_contact_info_two' => $request->siblings_contact_info_two,
            'sign_date' => $request->sign_date,
            'evaluation_date' => $request->evaluation_date,

            'casual_leave_due_as_on' => $request->casual_leave_due_as_on,
            'casual_leave_availed' => $request->casual_leave_availed,
            'casual_balance_due' => $request->casual_balance_due,
            'earned_leave_due_as_on' => $request->earned_leave_due_as_on,
            'earned_leave_availed' => $request->earned_leave_availed,
            'earned_balance_due' => $request->earned_balance_due,
            'medical_leave_due_as_on' => $request->medical_leave_due_as_on,
            'medical_leave_availed' => $request->medical_leave_availed,
            'medical_balance_due' => $request->medical_balance_due,

            'police_verification' => $request->police_verification,
            'acknowledgement' => $request->acknowledgement,

            'operation_director_sign' => $globalFunOperationDirectorSign['status'] == 1 ? $globalFunOperationDirectorSign['file_name'] : $admins->operation_director_sign,

            'managing_director_sign' => $globalFunManagingDirectorSign['status'] == 1 ? $globalFunManagingDirectorSign['file_name'] : $admins->managing_director_sign,

            'sign' => $globalFunSign['status'] == 1 ? $globalFunSign['file_name'] : $admins->sign,

            'ceo_sign' => $globalFunCeoSign['status'] == 1 ? $globalFunCeoSign['file_name'] : $admins->ceo_sign,

        ]);

        toastr()->success('Employee Form Update Successfully');
        return redirect()->route('all.employee.details');
    }

    public function DeleteEmployeeDetails($id)
    {
        $user = EmployeeInformation::findOrFail($id);

        $paths = [
            storage_path("app/public/employee/sign/{$user->sign}"),
            storage_path("app/public/employee/ceosign/{$user->ceo_sign}"),
            storage_path("app/public/employee/managingsign/{$user->managing_director_sign}"),
            storage_path("app/public/employee/operationsign/{$user->operation_director_sign}"),
        ];

        foreach ($paths as $path) {
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        if (!is_null($user)) {
            $user->delete();
        }

        $user->delete();

        toastr()->success('Employee Form Delete Successfully');
        return redirect()->route('all.employee.details');

    }

}
