<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    //All SubCategory
    public function AllSubCategory()
    {
        $categorys = Category::orderby('category_name', 'ASC')->latest()->get();
        $subcategorys = SubCategory::all();

        return view('admin.pages.subcategory.all_subcategory', compact('subcategorys', 'categorys'));
    }

    //Store SubCategory
    public function StoreSubCategory(Request $request)
    {
        $validator = $request->validate(

            [
                'category_id' => 'required',
                'subcategory_name' => 'required|max:255',
                'subcategory_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_id.required' => 'Category Name is required',
                'subcategory_name.required' => 'SubCategory Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('subcategory_image');
            $imgPath = storage_path('app/public/subcategory');

            if (empty($mainFile)) {
                SubCategory::insert([

                    'category_id' => $request->category_id,
                    'subcategory_name' => $request->subcategory_name,
                    'subcategory_slug' => strtolower(str_replace('', '-', $request->subcategory_name)),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = Helper::customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {

                    SubCategory::insert([

                        'category_id' => $request->category_id,
                        'subcategory_name' => $request->subcategory_name,
                        'subcategory_slug' => strtolower(str_replace('', '-', $request->subcategory_name)),
                        'description' => $request->description,

                        'subcategory_image' => $globalFunImg['file_name'],

                    ]);

                } else {
                    toastr()->warning('Image upload failed! plz try again.');
                }

            }

            toastr()->success('SubCategory Created Successfully');
            return redirect()->route('all.subcategory');

        }
    }

    //Update SubCategory
    public function UpdateSubCategory(Request $request)
    {
        $subcat = SubCategory::findOrFail($request->id);

        $validator = $request->validate(

            [
                'category_id' => 'required',
                'subcategory_name' => 'required|max:255',
                'subcategory_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_id.required' => 'Category Name is required',
                'subcategory_name.required' => 'SubCategory Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('subcategory_image');

            $uploadPath = storage_path('app/public/subcategory');

            if (isset($mainFile)) {
                $globalFunImg = Helper::customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($subcat)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/subcategory/requestImg/') . $subcat->subcategory_image)) {
                        File::delete(public_path('storage/subcategory/requestImg/') . $subcat->subcategory_image);
                    }
                    if (File::exists(public_path('storage/subcategory/') . $subcat->subcategory_image)) {
                        File::delete(public_path('storage/subcategory/') . $subcat->subcategory_image);
                    }
                }

                $subcat->update([

                    'category_id' => $request->category_id,
                    'subcategory_name' => $request->subcategory_name,
                    'subcategory_slug' => strtolower(str_replace('', '-', $request->subcategory_name)),
                    'description' => $request->description,

                    'subcategory_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $subcat->subcategory_image,

                ]);
            }

            toastr()->success('SubCategory Update Successfully');
            return redirect()->route('all.subcategory');
        }

    }

    //Delete SubCategory
    public function DeleteSubCategory($id)
    {
        $subcat = SubCategory::find($id);

        if (File::exists(public_path('storage/subcategory/requestImg/') . $subcat->subcategory_image)) {
            File::delete(public_path('storage/subcategory/requestImg/') . $subcat->subcategory_image);
        }

        if (File::exists(public_path('storage/subcategory/') . $subcat->subcategory_image)) {
            File::delete(public_path('storage/subcategory/') . $subcat->subcategory_image);
        }

        $subcat->delete();

        toastr()->success('SubCategory Delete Successfully');

        return redirect()->route('all.subcategory');
    }

    //Inactive SubCategory
    public function InactiveSubCategory($id)
    {
        SubCategory::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('SubCategory Inactive Successfully');

        return redirect()->back();
    }

    //Active SubCategory
    public function ActiveSubCategory($id)
    {

        SubCategory::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('SubCategory Active Successfully');

        return redirect()->back();
    }

    //Get SubCategory
    public function GetSubCategory($category_id)
    {

        $subCat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();

        return json_encode($subCat);

    }

}
