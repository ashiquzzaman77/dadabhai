<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //All Category
    public function AllCategory()
    {
        $categorys = Category::all();
        return view('admin.pages.category.all_category', compact('categorys'));
    }

    //Store Category
    public function StoreCategory(Request $request)
    {

        $validator = $request->validate(

            [
                'category_name' => 'required|max:255',
                'category_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
                'icon' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_name.required' => 'Category Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('category_image');
            $imgPath = storage_path('app/public/category');

            $iconmainFile = $request->file('icon'); ///////
            $iconimgPath = storage_path('app/public/category'); //////

            ////////
            if (empty($iconmainFile)) {

                $globalFunIconImg['file_name'] = '';

            } else {
                $globalFunIconImg = Helper::customUpload($iconmainFile, $iconimgPath);
                $globalFunIconImg['file_name'] = $globalFunIconImg['file_name'];
            }
            /////////////////////

            if (empty($mainFile)) {

                Category::insert([

                    'category_name' => $request->category_name,
                    'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
                    'description' => $request->description,

                ]);
            } else {

                $globalFunImg = Helper::customUpload($mainFile, $imgPath);

                if ($globalFunImg['status'] == 1) {
                    Category::insert([

                        'category_name' => $request->category_name,
                        'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
                        'description' => $request->description,

                        'category_image' => $globalFunImg['file_name'],

                        'icon' => $globalFunIconImg['file_name'], ////////

                    ]);
                } else {
                    toastr()->warning('Image upload failed! plz try again.');
                }
            }

            toastr()->success('Category Created Successfully');
            return redirect()->route('all.category');
        }

    }

    //Update Category
    public function UpdateCategory(Request $request)
    {

        $category = Category::findOrFail($request->id);

        $validator = $request->validate(

            [
                'category_name' => 'required|max:255',
                'category_image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],

            [
                'category_name.required' => 'Category Name is required',
            ],
        );

        if ($validator) {

            $mainFile = $request->file('category_image');
            $uploadPath = storage_path('app/public/category');

            $iconmainFile = $request->file('icon'); ///////
            $iconimgPath = storage_path('app/public/category'); //////

            if (isset($mainFile)) {
                $globalFunImg = Helper::customUpload($mainFile, $uploadPath);
            } else {
                $globalFunImg['status'] = 0;
            }

            ////////////
            if (isset($iconmainFile)) {
                $globalFunIconImg = Helper::customUpload($iconmainFile, $iconimgPath);
            } else {
                $globalFunIconImg['status'] = 0;
            }
            /////////////

            if (!empty($category)) {

                if ($globalFunImg['status'] == 1) {
                    if (File::exists(public_path('storage/category/requestImg/') . $category->category_image)) {
                        File::delete(public_path('storage/category/requestImg/') . $category->category_image);
                    }
                    if (File::exists(public_path('storage/category/') . $category->category_image)) {
                        File::delete(public_path('storage/category/') . $category->category_image);
                    }
                }

                ///////////

                if ($globalFunIconImg['status'] == 1) {
                    if (File::exists(public_path('storage/category/requestImg/') . $category->icon)) {
                        File::delete(public_path('storage/category/requestImg/') . $category->icon);
                    }
                    if (File::exists(public_path('storage/category/') . $category->icon)) {
                        File::delete(public_path('storage/category/') . $category->icon);
                    }
                }

                ////////

                $category->update([

                    'category_name' => $request->category_name,
                    'category_slug' => strtolower(str_replace('', '-', $request->category_name)),
                    'description' => $request->description,
                    'category_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $category->category_image,

                    'icon' => $globalFunIconImg['status'] == 1 ? $globalFunIconImg['file_name'] : $category->icon, ////

                ]);
            }
        }

        toastr()->success('Category Update Successfully');
        return redirect()->route('all.category');

    }

    //Delete Category
    public function DeleteCategory($id)
    {
        $category = Category::find($id);

        if (File::exists(public_path('storage/category/requestImg/') . $category->category_image)) {
            File::delete(public_path('storage/brand/requestImg/') . $category->category_image);
        }

        if (File::exists(public_path('storage/category/') . $category->category_image)) {
            File::delete(public_path('storage/category/') . $category->category_image);
        }

        $category->delete();

        toastr()->success('Category Delete Successfully');

        return redirect()->route('all.category');
    }

    //Inactive Category
    public function InactiveCategory($id)
    {
        Category::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('Category Inactive Successfully');

        return redirect()->back();
    }

    //Active Category
    public function ActiveCategory($id)
    {

        Category::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('Category Active Successfully');

        return redirect()->back();
    }

}
