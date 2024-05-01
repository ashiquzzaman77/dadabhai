<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //All About
    public function AllAbout()
    {
        $abouts = About::all();
        return view('admin.pages.about.all_about', compact('abouts'));
    }

    //Edit About
    public function EditAbout($id)
    {
        $about = About::findOrFail($id);
        return view('admin.pages.about.edit_about', compact('about'));
    }

    //Update About
    public function UpdateAbout(Request $request)
    {
        $uid = $request->id;
        $abouts = About::findOrFail($uid);

        //section_one_image
        if (!empty($request->file('section_one_image'))) {
            $file = $request->file('section_one_image');

            @unlink(public_path('upload/about/' . $abouts->section_one_image));

            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path('upload/about/'), $fileName);
            $section_one_image = $fileName;
        }

        //ceo_section_image
        if (!empty($request->file('ceo_section_image'))) {

            $file = $request->file('ceo_section_image');

            @unlink(public_path('upload/about/' . $abouts->ceo_section_image));

            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path('upload/about/'), $fileName);
            $ceo_section_image = $fileName;
        }

        //ceo_section_signature_image
        if (!empty($request->file('ceo_section_signature_image'))) {

            $file = $request->file('ceo_section_signature_image');

            @unlink(public_path('upload/about/' . $abouts->ceo_section_signature_image));

            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path('upload/about/'), $fileName);
            $ceo_section_signature_image = $fileName;
        }

        //choose_us_one_image
        if (!empty($request->file('choose_us_one_image'))) {

            $file = $request->file('choose_us_one_image');

            @unlink(public_path('upload/about/' . $abouts->choose_us_one_image));

            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path('upload/about/'), $fileName);
            $choose_us_one_image = $fileName;
        }

        //choose_us_two_image
        if (!empty($request->file('choose_us_two_image'))) {

            $file = $request->file('choose_us_two_image');

            @unlink(public_path('upload/about/' . $abouts->choose_us_two_image));

            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path('upload/about/'), $fileName);
            $choose_us_two_image = $fileName;
        }

        //choose_us_three_image
        if (!empty($request->file('choose_us_three_image'))) {

            $file = $request->file('choose_us_three_image');

            @unlink(public_path('upload/about/' . $abouts->choose_us_one_image));

            $fileName = time() . $file->getClientOriginalName();
            $file->move(public_path('upload/about/'), $fileName);
            $choose_us_three_image = $fileName;
        }

        $abouts->update([

            'breadcrumb_title' => $request->breadcrumb_title,
            'breadcrumb_sub_title' => $request->breadcrumb_sub_title,

            'section_one_title' => $request->section_one_title,
            'section_one_badge' => $request->section_one_badge,
            'section_one_sub_title' => $request->section_one_sub_title,
            'section_one_description' => $request->section_one_description,

            'section_two_title' => $request->section_two_title,
            'section_two_badge' => $request->section_two_badge,
            'section_two_sub_title' => $request->section_two_sub_title,
            'section_two_description' => $request->section_two_description,

            'ceo_section_badge' => $request->ceo_section_badge,
            'ceo_section_title' => $request->ceo_section_title,
            'ceo_section_sub_title' => $request->ceo_section_sub_title,
            'ceo_section_description' => $request->ceo_section_description,
            'ceo_section_ceo_name' => $request->ceo_section_ceo_name,
            'ceo_section_ceo_designation' => $request->ceo_section_ceo_designation,

            'choose_us_section_title' => $request->choose_us_section_title,

            'choose_us_one_title' => $request->choose_us_one_title,
            'choose_us_one_description' => $request->choose_us_one_description,

            'choose_us_two_title' => $request->choose_us_two_title,
            'choose_us_two_description' => $request->choose_us_two_description,

            'choose_us_three_title' => $request->choose_us_three_title,
            'choose_us_three_description' => $request->choose_us_three_description,

            'contact_section_title' => $request->contact_section_title,
            
            'head_office_title' => $request->head_office_title,
            'head_office_address' => $request->head_office_address,
            'head_office_email' => $request->head_office_email,
            'head_office_phone' => $request->head_office_phone,

            'sub_office_one_title' => $request->sub_office_one_title,
            'sub_office_one_address' => $request->sub_office_one_address,
            'sub_office_one_email' => $request->sub_office_one_email,
            'sub_office_one_phone' => $request->sub_office_one_phone,

            'sub_office_two_title' => $request->sub_office_two_title,
            'sub_office_two_address' => $request->sub_office_two_address,
            'sub_office_two_email' => $request->sub_office_two_email,
            'sub_office_two_phone' => $request->sub_office_two_phone,

            'sub_office_three_title' => $request->sub_office_three_title,
            'sub_office_three_address' => $request->sub_office_three_address,
            'sub_office_three_email' => $request->sub_office_three_email,
            'sub_office_three_phone' => $request->sub_office_three_phone,

            'sub_office_four_title' => $request->sub_office_four_title,
            'sub_office_four_address' => $request->sub_office_four_address,
            'sub_office_four_email' => $request->sub_office_four_email,
            'sub_office_four_phone' => $request->sub_office_four_phone,

            'counter_one_value' => $request->counter_one_value,
            'counter_one_title' => $request->counter_one_title,

            'counter_two_value' => $request->counter_two_value,
            'counter_two_title' => $request->counter_two_title,

            'counter_three_value' => $request->counter_three_value,
            'counter_three_title' => $request->counter_three_title,

            'counter_four_value' => $request->counter_four_value,
            'counter_four_title' => $request->counter_four_title,

            'status' => $request->status,

            'section_one_image' => (!empty($section_one_image) ? $section_one_image : $abouts->section_one_image),

            'ceo_section_image' => (!empty($ceo_section_image) ? $ceo_section_image : $abouts->ceo_section_image),

            'ceo_section_signature_image' => (!empty($ceo_section_signature_image) ? $ceo_section_signature_image : $abouts->ceo_section_signature_image),

            'choose_us_one_image' => (!empty($choose_us_one_image) ? $choose_us_one_image : $abouts->choose_us_one_image),

            'choose_us_two_image' => (!empty($choose_us_two_image) ? $choose_us_two_image : $abouts->choose_us_two_image),

            'choose_us_three_image' => (!empty($choose_us_three_image) ? $choose_us_three_image : $abouts->choose_us_three_image),

        ]);

        toastr()->success('About Created Successfully');
        return redirect()->route('all.about');
    }

    //Delete About
    public function DeleteAbout($id)
    {
        $about = About::find($id);

        $imgDel = $about->section_one_image;
        $imgDel = $about->ceo_section_image;
        $imgDel = $about->ceo_section_signature_image;

        $imgDel = $about->choose_us_one_image;
        $imgDel = $about->choose_us_two_image;
        $imgDel = $about->choose_us_three_image;

        @unlink($imgDel);

        About::findOrFail($id)->delete();

        toastr()->success('About Delete Successfully');
        return redirect()->route('all.about');

    }
}
