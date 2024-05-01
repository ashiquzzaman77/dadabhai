<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Offer;
use App\Models\Admin\Product;
use App\Models\Admin\Wishlist;
use App\Models\User\Order;
use App\Models\User\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateOneCartController extends Controller
{
    //Offer To Cart
    public function OfferToCartTemplateOne(Request $request, $id)
    {
        $product = Offer::findOrFail($id);
        // dd($request->all());
        Cart::add([

            'id' => $id,
            'name' => $request->product_name,
            'qty' => $request->quantity,
            'price' => $request->price,
            'weight' => 1,
            'options' => [
                'image' => $product->offer_image,
                // 'color' => $request->color,
            ],
        ]);

        return response()->json(['success' => 'Successfully Add on Your Cart']);

    }

    //Buy To Cart
    public function BuyToCartTemplateOne(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->price_status == 'rfq') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->sas_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Buy on Your Cart']);
        } elseif ($product->price_status == 'discount_price') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Buy on Your Cart']);
        } else {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Buy on Your Cart']);
        }
    }

    //Add To Cart
    public function AddToCartTemplateOne(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->price_status == 'rfq') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->sas_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } elseif ($product->price_status == 'discount_price') {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_image,
                    // 'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    }

    // Add MiniCart
    public function AddMiniCartTemplateOne()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,

        ));
    }

    //Remove MiniCart TemplateOne
    public function RemoveMiniCartTemplateOne($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);

    }

    //View Cart TemplateOne
    public function ViewCartTemplateOne()
    {
        return view('frontend.template_one.cart.view_cart');
    }

    //GetCartProduct
    public function GetCartProduct()
    {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,

        ));
    }

    //CartRemove
    public function CartRemove($rowId)
    {
        Cart::remove($rowId);

        return response()->json(['success' => 'Successfully Remove From Cart']);
    }

    public function CartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        return response()->json('Decrement');
    } // End Method

    public function CartIncrement($rowId)
    {

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('Increment');
    }

    //Checkout Templat eOne
    public function CheckoutTemplateOne()
    {
        if (Auth::check()) {

            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                return view('frontend.template_one.cart.checkout', compact('carts', 'cartQty', 'cartTotal'));
            } else {

                toastr()->error('You Need to Login First');

                return redirect()->to('/');
            }
        } else {

            toastr()->error('You Need to Login First');

            return redirect()->route('template.one.login');
        }

    }

    public function CheckoutStoreTemplateOne(Request $request)
    {
        //dd($request->all());
        $order_id = Order::insertGetId([

            'user_id' => Auth::id(),

            'billing_name' => $request->billing_name,
            'billing_address_line1' => $request->billing_address_line1,
            'billing_address_line2' => $request->billing_address_line2,
            'billing_city' => $request->billing_city,
            'billing_state' => $request->billing_state,
            'billing_postal_code' => $request->billing_postal_code,
            'billing_country' => $request->billing_country,
            'billing_phone' => $request->billing_phone,
            'billing_email' => $request->billing_email,
            'notes' => $request->notes,

            'shipping_charge' => $request->shipping_charge,
            'payment_method' => 'Cash On Delivery',
            'transaction_number' => 'Cash On Delivery',
            'total_amount' => $request->total_amount,

            'invoice_number' => 'DV' . mt_rand(10000000, 99999999),
            'order_number' => Helper::generateOrderNumber(),

            'order_date' => Carbon::now()->format('dmy'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),

            'created_at' => Carbon::now(),

        ]);

        $carts = Cart::content();
        foreach ($carts as $cart) {

            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => now(),

            ]);
        } // End Foreach

        Cart::destroy();

        toastr()->success('Payment Successfully');

        return redirect()->route('index');

    }

    //Add To WishList
    public function AddToWishList(Request $request, $product_id)
    {

        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => now(),

                ]);
                return response()->json(['success' => 'Successfully Added On Your Wishlist']);
            } else {
                return response()->json(['error' => 'This Product Has Already on Your Wishlist']);
            }
        } else {
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

    //AllWishlist
    public function TemplateOneWishlist()
    {
        return view('frontend.template_one.cart.wishlist');
    }

    //Get Wishlist Product
    public function GetWishlistProduct()
    {

        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        $wishQty = wishlist::count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]);

    }

    //WishlistRemove
    public function WishlistRemove($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully Product Remove']);
    }

}
