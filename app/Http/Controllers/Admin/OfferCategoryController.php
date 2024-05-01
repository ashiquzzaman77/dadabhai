<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Offer;
use App\Models\Admin\OfferCategory;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OfferCategoryController extends Controller
{

    //All Offer Category
    public function AllOfferCategory()
    {
        $offercats = OfferCategory::latest()->get();
        return view('admin.pages.offer.all_offer_category', compact('offercats'));
    }

    //StoreOffer
    public function StoreOfferCategory(Request $request)
    {

        $mainFile = $request->file('offer_category_image');
        $imgPath = storage_path('app/public/offer_category_image');

        if (empty($mainFile)) {

            OfferCategory::insert([

                'offer_category_name' => $request->offer_category_name,
                'offer_category_image' => $request->offer_category_image,

            ]);
        } else {

            $globalFunImg = Helper::customUpload($mainFile, $imgPath);

            if ($globalFunImg['status'] == 1) {
                OfferCategory::insert([

                    'offer_category_name' => $request->offer_category_name,
                    'offer_category_image' => $globalFunImg['file_name'],

                ]);
            } else {
                toastr()->warning('Image upload failed! plz try again.');
            }
        }

        toastr()->success('Offer Category Created Successfully');
        return redirect()->route('all.offer.category');

    }

    //Update Offer Category
    public function UpdateOfferCategory(Request $request)
    {
        $offer = OfferCategory::findOrFail($request->id);

        $mainFile = $request->file('offer_category_image');

        $uploadPath = storage_path('app/public/offer_category_image');

        if (isset($mainFile)) {
            $globalFunImg = Helper::customUpload($mainFile, $uploadPath);
        } else {
            $globalFunImg['status'] = 0;
        }

        if (!empty($offer)) {

            if ($globalFunImg['status'] == 1) {
                if (File::exists(public_path('storage/offer_category_image/requestImg/') . $offer->offer_category_image)) {
                    File::delete(public_path('storage/offer_category_image/requestImg/') . $offer->offer_category_image);
                }
                if (File::exists(public_path('storage/offer_category_image/') . $offer->offer_category_image)) {
                    File::delete(public_path('storage/offer_category_image/') . $offer->offer_category_image);
                }
            }

            $offer->update([

                'offer_category_name' => $request->offer_category_name,

                'offer_category_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $offer->offer_category_image,

            ]);
        }

        toastr()->success('Offer Category Update Successfully');

        return redirect()->route('all.offer.category');
    }

    //Delete Offer Category
    public function DeleteOfferCategory($id)
    {

        $offer = OfferCategory::find($id);

        if (File::exists(public_path('storage/offer_category_image/requestImg/') . $offer->offer_category_image)) {
            File::delete(public_path('storage/offer_category_image/requestImg/') . $offer->offer_category_image);
        }

        if (File::exists(public_path('storage/offer_category_image/') . $offer->offer_category_image)) {
            File::delete(public_path('storage/offer_category_image/') . $offer->offer_category_image);
        }

        $offer->delete();

        toastr()->success('Offer Category Delete Successfully');

        return redirect()->route('all.offer.category');
    }

    //Inactive Offer Category
    public function InactiveOfferCategory($id)
    {

        OfferCategory::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('Offer Category Inactive Successfully');

        return redirect()->back();
    }

    //Active Offer Category
    public function ActiveOfferCategory($id)
    {

        OfferCategory::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('Offer Category Active Successfully');

        return redirect()->back();
    }

    ///////////////////////////////////// Offer Section ////////////////////////////////////

    //All Offer
    public function AllOffer()
    {
        $offers = Offer::latest()->get();
        $offercats = OfferCategory::latest()->get();
        return view('admin.pages.offer.all_offer', compact('offers','offercats'));
    }

    //StoreOffer
    public function StoreOffer(Request $request)
    {

        $mainFile = $request->file('offer_image');
        $imgPath = storage_path('app/public/offer_image');

        if (empty($mainFile)) {

            Offer::insert([

                'name' => $request->name,
                'slug' => strtolower(str_replace('-', '', $request->name)),

                'offer_category_id' => $request->offer_category_id,

                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'discount_percentage' => $request->discount_percentage,

                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,

            ]);
        } else {

            $globalFunImg = Helper::customUpload($mainFile, $imgPath);

            if ($globalFunImg['status'] == 1) {
                Offer::insert([

                    'name' => $request->name,
                    'slug' => strtolower(str_replace('-', '', $request->name)),

                    'offer_category_id' => $request->offer_category_id,

                    'price' => $request->price,
                    'discount_price' => $request->discount_price,
                    'discount_percentage' => $request->discount_percentage,

                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'description' => $request->description,

                    'offer_image' => $globalFunImg['file_name'],

                ]);
            } else {
                toastr()->warning('Image upload failed! plz try again.');
            }
        }

        toastr()->success('Offer Created Successfully');
        return redirect()->route('all.offer');

    }

    //Update Offer
    public function UpdateOffer(Request $request)
    {
        $offer = Offer::findOrFail($request->id);

        $mainFile = $request->file('offer_image');

        $uploadPath = storage_path('app/public/offer_image');

        if (isset($mainFile)) {
            $globalFunImg = Helper::customUpload($mainFile, $uploadPath);
        } else {
            $globalFunImg['status'] = 0;
        }

        if (!empty($offer)) {

            if ($globalFunImg['status'] == 1) {
                if (File::exists(public_path('storage/offer_image/requestImg/') . $offer->offer_image)) {
                    File::delete(public_path('storage/offer_image/requestImg/') . $offer->offer_image);
                }
                if (File::exists(public_path('storage/offer_image/') . $offer->offer_image)) {
                    File::delete(public_path('storage/offer_image/') . $offer->offer_image);
                }
            }

            $offer->update([

                'name' => $request->name,
                'slug' => strtolower(str_replace('-', '', $request->name)),

                'offer_category_id' => $request->offer_category_id,

                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'discount_percentage' => $request->discount_percentage,

                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'description' => $request->description,

                'offer_image' => $globalFunImg['status'] == 1 ? $globalFunImg['file_name'] : $offer->offer_image,

            ]);
        }

        toastr()->success('Offer Update Successfully');

        return redirect()->route('all.offer');
    }

    //Delete Offer
    public function DeleteOffer($id)
    {

        $offer = Offer::find($id);

        if (File::exists(public_path('storage/offer_image/requestImg/') . $offer->offer_image)) {
            File::delete(public_path('storage/offer_image/requestImg/') . $offer->offer_image);
        }

        if (File::exists(public_path('storage/offer_image/') . $offer->offer_image)) {
            File::delete(public_path('storage/offer_image/') . $offer->offer_image);
        }

        $offer->delete();

        toastr()->success('Offer Delete Successfully');

        return redirect()->route('all.offer');
    }

    //InactiveOffer
    public function InactiveOffer($id)
    {

        Offer::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('Offer Inactive Successfully');

        return redirect()->back();
    }

    //ActiveOffer
    public function ActiveOffer($id)
    {

        Offer::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('Offer Active Successfully');

        return redirect()->back();
    }

}
