<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Shipping;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    //All Charge
    public function AllShippingCharge()
    {
        $charges = Shipping::all();
        return view('admin.pages.shipping_charge.all_shipping_charge', compact('charges'));
    }

    //Store ShippingCharge
    public function StoreShippingCharge(Request $request)
    {

        Shipping::create([

            'title' => $request->title,
            'value' => $request->value,
            'comment' => $request->comment,
            'created_at' => now(),

        ]);

        toastr()->success('Shipping Charge Created Successfully');
        return redirect()->route('all.shipping.charge');
    }

    //Update ShippingCharge
    public function UpdateShippingCharge(Request $request)
    {

        $uid = $request->id;

        Shipping::find($uid)->update([

            'title' => $request->title,
            'value' => $request->value,
            'comment' => $request->comment,

        ]);

        toastr()->success('Shipping Charge Update Successfully');
        return redirect()->route('all.shipping.charge');

    }

    //Delete ShippingCharge
    public function DeleteShippingCharge($id)
    {

        Shipping::find($id)->delete();

        toastr()->success('Shipping Charge Delete Successfully');
        return redirect()->route('all.shipping.charge');
    }

    //Inactive ShippingCharge
    public function InactiveShippingCharge($id)
    {
        Shipping::find($id)->update([
            'status' => '0',
        ]);

        toastr()->success('ShippingCharge Inactive Successfully');

        return redirect()->back();
    }

    //Active ShippingCharge
    public function ActiveShippingCharge($id)
    {

        Shipping::find($id)->update([
            'status' => '1',
        ]);

        toastr()->success('ShippingCharge Active Successfully');
        return redirect()->back();
    }
}
