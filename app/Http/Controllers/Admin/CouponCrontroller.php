<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponCrontroller extends Controller
{
    //All Coupon
    public function AllCoupon()
    {
        $coupons = Coupon::all();
        return view('admin.pages.coupon.all_coupon', compact('coupons'));
    }

    //Store ShippingCharge
    public function StoreCoupon(Request $request)
    {

        Coupon::create([

            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => now(),

        ]);

        toastr()->success('Coupon Created Successfully');
        return redirect()->route('all.coupon');
    }

    //Update Coupon
    public function UpdateCoupon(Request $request)
    {

        $uid = $request->id;

        Coupon::find($uid)->update([

            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,

        ]);

        toastr()->success('Coupon Update Successfully');
        return redirect()->route('all.coupon');

    }

    //Delete COupon
    public function DeleteCoupon($id)
    {

        Coupon::find($id)->delete();

        toastr()->success('Coupon Delete Successfully');
        return redirect()->route('all.coupon');
    }

    //Inactive Coupon
    public function InactiveCoupon($id)
    {
        Coupon::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('Coupon Inactive Successfully');

        return redirect()->back();
    }

    //Active Coupon
    public function ActiveCoupon($id)
    {

        Coupon::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('Coupon Active Successfully');
        return redirect()->back();
    }
}
