<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Template;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //All template
    public function AllTemplate()
    {
        $templates = Template::all();
        return view('admin.pages.template.all_template', compact('templates'));
    }

    // //Update Brand
    public function UpdateTemplate(Request $request)
    {

        $uid = $request->id;

        Template::find($uid)->update([

            'name' => $request->name,
            'status' => $request->status,
            'active_at' => now(),
            'next_template' => $request->next_template,
            'next_activition_date' => $request->next_activition_date,
        ]);

        toastr()->success('Website Template Update Successfully');

        return redirect()->route('all.template');

    }

}
