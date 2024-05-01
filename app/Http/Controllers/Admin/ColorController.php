<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //All Category
    public function AllColor()
    {
        $colors = Color::all();
        return view('admin.pages.color.all_color', compact('colors'));
    }

    //Store Category
    public function StoreColor(Request $request)
    {
        Color::insert([

            'color_name' => $request->color_name,
            'color_slug' => strtolower(str_replace('', '-', $request->color_name)),
            'color_code' => $request->color_code,

            'created_at' => now(),

        ]);

        toastr()->success('Color inserted Successfully');
        return redirect()->route('all.color');
    }

    //Update Color
    public function UpdateColor(Request $request)
    {
        $uid = $request->id;

        Color::find($uid)->update([

            'color_name' => $request->color_name,
            'color_slug' => strtolower(str_replace('', '-', $request->color_name)),
            'color_code' => $request->color_code,

        ]);

        toastr()->success('Color Update Successfully');
        return redirect()->route('all.color');
    }

    //Delete Color
    public function DeleteColor($id)
    {
        Color::find($id)->delete();

        toastr()->success('Color Delete Successfully');
        return redirect()->route('all.color');
    }
}
