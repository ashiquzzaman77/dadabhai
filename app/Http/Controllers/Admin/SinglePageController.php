<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\ProductSinglePage;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SinglePageController extends Controller
{
    //All Single Page
    public function AllSinglePage()
    {
        $sproducts = ProductSinglePage::latest()->get();
        return view('admin.pages.single_product.all_single_product', compact('sproducts'));
    }

    //Add Single Page
    public function AddSinglePage()
    {
        $products = Product::latest()->get();
        return view('admin.pages.single_product.add_single_product', compact('products'));
    }

    //Store Single Page
    public function StoreSinglePage(Request $request)
    {
        $files = [
            'row_two_image_one', 'row_two_image_two', 'row_two_image_three', 'row_two_image_four',
            'row_five_image', 'row_six_background_image', 'row_seven_background_image',
            'row_eight_image', 'row_nine_background_image', 'row_nine_image', 'row_ten_image_one', 'row_ten_image_two',
            'row_eleven_image', 'row_thirteen_background_image', 'row_thirteen_image_one',
            'row_thirteen_image_two', 'row_fourteen_background_image',
            'row_fifteen_image', 'row_sixteen_background_image', 'row_sixteen_image',
            'row_seventeen_image', 'row_eighteen_background_image', 'row_eighteen_image',
            'row_nineteen_image_one', 'row_nineteen_image_two',
            'row_nineteen_image_three', 'feature_section_background_image', 'feature_one_image',
            'feature_two_image', 'feature_three_image', 'feature_four_image', 'feature_five_image', 'feature_six_image',
            'design_section_image_one', 'design_section_image_two', 'design_section_image_three', 'design_section_image_four',
        ];

        $filePath = storage_path('app/public/single_product/');
        $filePaths = [];

        foreach ($files as $file) {
            $uploadedFile = $request->file($file);
            $globalFunFile = !empty($uploadedFile) ? Helper::customUpload($uploadedFile, $filePath) : ['status' => 0];
            $filePaths[$file] = $globalFunFile['status'] == 1 ? $uploadedFile->hashName() : null;
        }

        ProductSinglePage::create([

            'status' => $request->status,
            'product_id' => $request->product_id,

            'row_three_title' => $request->row_three_title,
            'row_three_description' => $request->row_three_description,
            'row_five_title' => $request->row_five_title,
            'row_five_description' => $request->row_five_description,
            'row_six_title' => $request->row_six_title,
            'row_six_sub_title' => $request->row_six_sub_title,
            'row_six_short_description' => $request->row_six_short_description,
            'row_six_description' => $request->row_six_description,
            'row_seven_title' => $request->row_seven_title,
            'row_nine_title' => $request->row_nine_title,
            'row_nine_sub_title' => $request->row_nine_sub_title,
            'row_ten_title' => $request->row_ten_title,
            'row_ten_description' => $request->row_ten_description,
            'row_eleven_title' => $request->row_eleven_title,
            'row_eleven_description' => $request->row_eleven_description,
            'row_twelve_description' => $request->row_twelve_description,
            'row_thirteen_image_one_title' => $request->row_thirteen_image_one_title,
            'row_thirteen_image_two_title' => $request->row_thirteen_image_two_title,
            'row_fourteen_title' => $request->row_fourteen_title,
            'row_fifteen_title' => $request->row_fifteen_title,
            'row_fifteen_sub_title' => $request->row_fifteen_sub_title,
            'row_fifteen_description' => $request->row_fifteen_description,
            'row_sixteen_title' => $request->row_sixteen_title,
            'row_sixteen_sub_title' => $request->row_sixteen_sub_title,
            'row_sixteen_description' => $request->row_sixteen_description,
            'row_seventeen_title' => $request->row_seventeen_title,
            'row_eighteen_title' => $request->row_eighteen_title,
            'row_eighteen_sub_title' => $request->row_eighteen_sub_title,
            'row_eighteen_description' => $request->row_eighteen_description,
            'row_nineteen_title' => $request->row_nineteen_title,
            'row_nineteen_description' => $request->row_nineteen_description,
            'row_nineteen_image_one_title' => $request->row_nineteen_image_one_title,
            'row_nineteen_image_two_title' => $request->row_nineteen_image_two_title,
            'row_nineteen_image_three_title' => $request->row_nineteen_image_three_title,
            'feature_one_title' => $request->feature_one_title,
            'feature_one_description' => $request->feature_one_description,
            'feature_two_title' => $request->feature_two_title,
            'feature_two_description' => $request->feature_two_description,
            'feature_three_title' => $request->feature_three_title,
            'feature_three_description' => $request->feature_three_description,
            'feature_four_title' => $request->feature_four_title,
            'feature_four_description' => $request->feature_four_description,
            'feature_five_title' => $request->feature_five_title,
            'feature_five_description' => $request->feature_five_description,
            'feature_six_title' => $request->feature_six_title,
            'feature_six_description' => $request->feature_six_description,
            'design_section_title' => $request->design_section_title,
            'design_section_description' => $request->design_section_description,
        ] + $filePaths);

        toastr()->success('Single Product Created Successfully');
        return redirect()->route('all.single.page');
    }

    //Edit Single Page
    public function EditSinglePage($id)
    {
        $single_product = ProductSinglePage::find($id);
        $products = Product::latest()->get();

        return view('admin.pages.single_product.edit_single_product', compact('products', 'single_product'));
    }

    //Update Single Page
    public function UpdateSinglePage(Request $request)
    {
        $productSinglePage = ProductSinglePage::find($request->id);

        $files = [
            'row_two_image_one', 'row_two_image_two', 'row_two_image_three', 'row_two_image_four',
            'row_five_image', 'row_six_background_image', 'row_seven_background_image',
            'row_eight_image', 'row_nine_background_image', 'row_nine_image', 'row_ten_image_one', 'row_ten_image_two',
            'row_eleven_image', 'row_thirteen_background_image', 'row_thirteen_image_one',
            'row_thirteen_image_two', 'row_fourteen_background_image',
            'row_fifteen_image', 'row_sixteen_background_image', 'row_sixteen_image',
            'row_seventeen_image', 'row_eighteen_background_image', 'row_eighteen_image',
            'row_nineteen_image_one', 'row_nineteen_image_two',
            'row_nineteen_image_three', 'feature_section_background_image', 'feature_one_image',
            'feature_two_image', 'feature_three_image', 'feature_four_image', 'feature_five_image', 'feature_six_image',
            'design_section_image_one', 'design_section_image_two', 'design_section_image_three', 'design_section_image_four',
        ];

        $filePath = storage_path('app/public/single_product/');
        $filePaths = [];

        foreach ($files as $file) {
            if ($request->hasFile($file)) {
                $uploadedFile = $request->file($file);
                $globalFunFile = Helper::customUpload($uploadedFile, $filePath);
                if ($globalFunFile['status'] == 1) {
                    // Delete old file if exists
                    $oldFilePath = storage_path('app/public/single_product/') . $productSinglePage->$file;
                    if (File::exists($oldFilePath)) {
                        File::delete($oldFilePath);
                    }
                    // Update the new file path
                    $filePaths[$file] = $uploadedFile->hashName();
                }
            }
        }

        $productSinglePage->update([
            'status' => $request->status,
            'product_id' => $request->product_id,
            'row_three_title' => $request->row_three_title,
            'row_three_description' => $request->row_three_description,
            'row_five_title' => $request->row_five_title,
            'row_five_description' => $request->row_five_description,
            'row_six_title' => $request->row_six_title,
            'row_six_sub_title' => $request->row_six_sub_title,
            'row_six_short_description' => $request->row_six_short_description,
            'row_six_description' => $request->row_six_description,
            'row_seven_title' => $request->row_seven_title,
            'row_nine_title' => $request->row_nine_title,
            'row_nine_sub_title' => $request->row_nine_sub_title,
            'row_ten_title' => $request->row_ten_title,
            'row_ten_description' => $request->row_ten_description,
            'row_eleven_title' => $request->row_eleven_title,
            'row_eleven_description' => $request->row_eleven_description,
            'row_twelve_description' => $request->row_twelve_description,
            'row_thirteen_image_one_title' => $request->row_thirteen_image_one_title,
            'row_thirteen_image_two_title' => $request->row_thirteen_image_two_title,
            'row_fourteen_title' => $request->row_fourteen_title,
            'row_fifteen_title' => $request->row_fifteen_title,
            'row_fifteen_sub_title' => $request->row_fifteen_sub_title,
            'row_fifteen_description' => $request->row_fifteen_description,
            'row_sixteen_title' => $request->row_sixteen_title,
            'row_sixteen_sub_title' => $request->row_sixteen_sub_title,
            'row_sixteen_description' => $request->row_sixteen_description,
            'row_seventeen_title' => $request->row_seventeen_title,
            'row_eighteen_title' => $request->row_eighteen_title,
            'row_eighteen_sub_title' => $request->row_eighteen_sub_title,
            'row_eighteen_description' => $request->row_eighteen_description,
            'row_nineteen_title' => $request->row_nineteen_title,
            'row_nineteen_description' => $request->row_nineteen_description,
            'row_nineteen_image_one_title' => $request->row_nineteen_image_one_title,
            'row_nineteen_image_two_title' => $request->row_nineteen_image_two_title,
            'row_nineteen_image_three_title' => $request->row_nineteen_image_three_title,
            'feature_one_title' => $request->feature_one_title,
            'feature_one_description' => $request->feature_one_description,
            'feature_two_title' => $request->feature_two_title,
            'feature_two_description' => $request->feature_two_description,
            'feature_three_title' => $request->feature_three_title,
            'feature_three_description' => $request->feature_three_description,
            'feature_four_title' => $request->feature_four_title,
            'feature_four_description' => $request->feature_four_description,
            'feature_five_title' => $request->feature_five_title,
            'feature_five_description' => $request->feature_five_description,
            'feature_six_title' => $request->feature_six_title,
            'feature_six_description' => $request->feature_six_description,
            'design_section_title' => $request->design_section_title,
            'design_section_description' => $request->design_section_description,
        ] + $filePaths);

        toastr()->success('Single Product Update Successfully');
        return redirect()->route('all.single.page');
    }

    public function DeleteSinglePage($id)
    {
        $product = ProductSinglePage::findOrFail($id);

        $imageKeys = [
            'row_two_image_one', 'row_two_image_two', 'row_two_image_three', 'row_two_image_four',
            'row_five_image', 'row_six_background_image', 'row_seven_background_image',
            'row_eight_image', 'row_nine_background_image', 'row_nine_image', 'row_ten_image_one', 'row_ten_image_two',
            'row_eleven_image', 'row_thirteen_background_image',  'row_thirteen_image_one',
            'row_thirteen_image_two', 'row_fourteen_background_image',
            'row_fifteen_image', 'row_sixteen_background_image', 'row_sixteen_image',
            'row_seventeen_image', 'row_eighteen_background_image', 'row_eighteen_image',
            'row_nineteen_image_one',  'row_nineteen_image_two',
            'row_nineteen_image_three',  'feature_section_background_image', 'feature_one_image',
            'feature_two_image', 'feature_three_image', 'feature_four_image', 'feature_five_image', 'feature_six_image',
            'design_section_image_one', 'design_section_image_two', 'design_section_image_three', 'design_section_image_four'
        ];

        foreach ($imageKeys as $imageKey) {
            $paths = [
                storage_path('app/public/single_product/') . $product->$imageKey,
                storage_path('app/public/single_product/requestImg/') . $product->$imageKey,
            ];

            foreach ($paths as $path) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }
        $product->forceDelete();

        toastr()->success('Single Product Delete Successfully');
        return redirect()->route('all.single.page');
    }

    //Inactive Single Page
    public function InactiveSinglePage($id)
    {
        ProductSinglePage::find($id)->update([

            'status' => 'inactive',

        ]);

        toastr()->success('Single Product Inactive Successfully');
        return redirect()->route('all.single.page');
    }

    //Active Single Page
    public function ActiveSinglePage($id)
    {

        ProductSinglePage::findOrFail($id)->update([

            'status' => 'active',

        ]);

        toastr()->success('Single Product Active Successfully');
        return redirect()->route('all.single.page');
    }
}
