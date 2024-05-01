<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\SubCategory;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChildCategoryController extends Controller
{

    //All SubCategory
    public function AllChildCategory()
    {
        $childcategorys = ChildCategory::all();
        $categorys = Category::latest()->get();

        $subcategorys = SubCategory::all();

        return view('admin.pages.childcategory.all_childcategory', compact('categorys', 'childcategorys', 'subcategorys'));
    }

    //Store SubCategory
    public function StoreChildCategory(Request $request)
    {
        $validator = $request->validate(

            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'childcategory_name' => 'required',
                'childcategory_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_id.required' => 'Category Name is required',
                'subcategory_id.required' => 'SubCategory Name is required',
                'childcategory_name.required' => 'ChildCategory Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('childcategory_image');
            $imgPath = storage_path('app/public/childcategory');

            if (empty($mainFile)) {

                ChildCategory::insert([

                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'childcategory_name' => $request->childcategory_name,
                    'childcategory_slug' => strtolower(str_replace('', '-', $request->childcategory_name)),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = Helper::customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {

                    ChildCategory::insert([

                        'category_id' => $request->category_id,
                        'subcategory_id' => $request->subcategory_id,
                        'childcategory_name' => $request->childcategory_name,
                        'childcategory_slug' => strtolower(str_replace('', '-', $request->childcategory_name)),
                        'description' => $request->description,

                        'childcategory_image' => $globalFunImg['file_name'],

                    ]);

                } else {
                    toastr()->warning('Image upload failed! plz try again.');
                }

            }

            toastr()->success('ChildCategory Created Successfully');
            return redirect()->route('all.childcategory');

        }
    }

    //Update ChildCategory
    public function UpdateChildCategory(Request $request)
    {
        $childcat = ChildCategory::findOrFail($request->id);

        $validator = $request->validate(

            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'childcategory_name' => 'required',
                'childcategory_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_id.required' => 'Category Name is required',
                'subcategory_id.required' => 'SubCategory Name is required',
                'childcategory_name.required' => 'ChildCategory Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('childcategory_image');

            $uploadPath = storage_path('app/public/childcategory');

            if (isset($mainFile)) {
                $globalFunImg = Helper::customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            if (!empty($childcat)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/childcategory/requestImg/') . $childcat->childcategory_image)) {
                        File::delete(public_path('storage/childcategory/requestImg/') . $childcat->childcategory_image);
                    }
                    if (File::exists(public_path('storage/childcategory/') . $childcat->childcategory_image)) {
                        File::delete(public_path('storage/childcategory/') . $childcat->childcategory_image);
                    }
                }

                $childcat->update([

                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'childcategory_name' => $request->childcategory_name,
                    'childcategory_slug' => strtolower(str_replace('', '-', $request->childcategory_name)),
                    'description' => $request->description,

                    'childcategory_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $childcat->childcategory_image,

                ]);
            }

            toastr()->success('ChildCategory Update Successfully');
            return redirect()->route('all.childcategory');
        }

    }

    //Delete ChildCategory
    public function DeleteChildCategory($id)
    {
        $childcat = ChildCategory::find($id);

        if (File::exists(public_path('storage/childcategory/requestImg/') . $childcat->childcategory_image)) {
            File::delete(public_path('storage/childcategory/requestImg/') . $childcat->childcategory_image);
        }

        if (File::exists(public_path('storage/childcategory/') . $childcat->childcategory_image)) {
            File::delete(public_path('storage/childcategory/') . $childcat->childcategory_image);
        }

        $childcat->delete();

        toastr()->success('ChildCategory Delete Successfully');

        return redirect()->route('all.childcategory');
    }

    //Inactive SubCategory
    public function InactiveChildCategory($id)
    {
        ChildCategory::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('ChildCategory Inactive Successfully');

        return redirect()->back();
    }

    //Active ChildCategory
    public function ActiveChildCategory($id)
    {

        ChildCategory::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('ChildCategory Active Successfully');

        return redirect()->back();
    }

}
