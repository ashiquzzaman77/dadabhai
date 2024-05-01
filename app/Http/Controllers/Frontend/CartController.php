<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\User\Order;
use App\Models\User\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //Add To Cart
    // public function AddToCartDetails(Request $request, $id)
    // {
    //     $product = Product::findOrFail($id);

    //     if ($product->price_status == 'rfq') {

    //         Cart::add([

    //             'id' => $id,
    //             'name' => $request->product_name,
    //             'qty' => $request->quantity,
    //             'price' => $product->sas_price,
    //             'weight' => 1,
    //             'options' => [
    //                 'image' => $product->product_image,
    //                 'color' => $request->color,
    //             ],
    //         ]);

    //         return response()->json(['success' => 'Successfully Added on Your Cart']);
    //     } elseif ($product->price_status == 'discount_price') {

    //         Cart::add([

    //             'id' => $id,
    //             'name' => $request->product_name,
    //             'qty' => $request->quantity,
    //             'price' => $product->discount_price,
    //             'weight' => 1,
    //             'options' => [
    //                 'image' => $product->product_image,
    //                 'color' => $request->color,
    //             ],
    //         ]);

    //         return response()->json(['success' => 'Successfully Added on Your Cart']);
    //     } else {

    //         Cart::add([

    //             'id' => $id,
    //             'name' => $request->product_name,
    //             'qty' => $request->quantity,
    //             'price' => $product->price,
    //             'weight' => 1,
    //             'options' => [
    //                 'image' => $product->product_image,
    //                 'color' => $request->color,
    //             ],
    //         ]);

    //         return response()->json(['success' => 'Successfully Added on Your Cart']);
    //     }
    // }

    //Add To MiniCart
    // public function AddMiniCart()
    // {

    //     $carts = Cart::content();
    //     $cartQty = Cart::count();
    //     $cartTotal = Cart::total();

    //     return response()->json(array(
    //         'carts' => $carts,
    //         'cartQty' => $cartQty,
    //         'cartTotal' => $cartTotal,

    //     ));
    // }

    //Remove MiniCart
    // public function RemoveMiniCart($rowId)
    // {
    //     Cart::remove($rowId);
    //     return response()->json(['success' => 'Product Remove From Cart']);
    // }

    //TotalCart
    // public function TotalCart()
    // {
    //     $cartTotal = Cart::subtotal();

    //     return view('frontend.pages.product.cart_product', compact('cartTotal'));
    // }

    //GetCartProduct
    // public function GetCartProduct()
    // {

    //     $carts = Cart::content();
    //     $cartQty = Cart::count();
    //     $cartTotal = Cart::total();

    //     return response()->json(array(
    //         'carts' => $carts,
    //         'cartQty' => $cartQty,
    //         'cartTotal' => $cartTotal,

    //     ));
    // }

    //GetCartProduct
    // public function GetCartProduct1()
    // {

    //     $carts = Cart::content();
    //     $cartQty = Cart::count();
    //     $cartTotal = Cart::total();

    //     return response()->json(array(
    //         'carts' => $carts,
    //         'cartQty' => $cartQty,
    //         'cartTotal' => $cartTotal,

    //     ));
    // }

    //CartDecrement
    // public function CartDecrement($rowId)
    // {
    //     $row = Cart::get($rowId);
    //     Cart::update($rowId, $row->qty - 1);

    //     return response()->json('Decrement');
    // }

    //CartIncrement
    // public function CartIncrement($rowId)
    // {
    //     $row = Cart::get($rowId);
    //     Cart::update($rowId, $row->qty + 1);

    //     return response()->json('Increment');
    // }

    //CartRemove
    // public function CartRemove($rowId)
    // {
    //     Cart::remove($rowId);
    //     return response()->json(['success' => 'Successfully Remove From Cart']);
    // }

    //checkout
    // public function CheckoutCreate()
    // {

    //     if (Cart::total() > 0) {

    //         $carts = Cart::content();
    //         $cartTotal = Cart::total();
    //         $cartQty = Cart::count();

    //         return view('frontend.pages.checkout.checkout', compact('carts', 'cartTotal', 'cartQty'));
    //     } else {

    //         toastr()->error('Shopping At list One Product');
    //         return redirect()->to('/');
    //     }

    // }

    //CheckoutStore

    // public function CheckoutStore(Request $request)
    // {
    //     //dd($request->all());
    //     $order_id = Order::insertGetId([

    //         'user_id' => Auth::id(),

    //         'billing_name' => $request->billing_name,
    //         'billing_address_line1' => $request->billing_address_line1,
    //         'billing_address_line2' => $request->billing_address_line2,
    //         'billing_city' => $request->billing_city,
    //         'billing_state' => $request->billing_state,
    //         'billing_postal_code' => $request->billing_postal_code,
    //         'billing_country' => $request->billing_country,
    //         'billing_phone' => $request->billing_phone,
    //         'billing_email' => $request->billing_email,

    //         'shipping_charge' => $request->shipping_charge,
    //         'payment_method' => 'Cash On Delivery',
    //         'transaction_number' => 'Cash On Delivery',
    //         'total_amount' => $request->total_amount,

    //         'invoice_number' => 'DV' . mt_rand(10000000, 99999999),
    //         'order_number' => Helper::generateOrderNumber(),

    //         'order_date' => Carbon::now()->format('dmy'),
    //         'order_month' => Carbon::now()->format('F'),
    //         'order_year' => Carbon::now()->format('Y'),

    //         'created_at' => Carbon::now(),

    //     ]);

    //     $carts = Cart::content();
    //     foreach ($carts as $cart) {

    //         OrderItem::insert([
    //             'order_id' => $order_id,
    //             'product_id' => $cart->id,
    //             'color' => $cart->options->color,
    //             'qty' => $cart->qty,
    //             'price' => $cart->price,
    //             'created_at' => now(),

    //         ]);
    //     } // End Foreach

    //     Cart::destroy();

    //     toastr()->success('Payment Successfully');
    //     return redirect()->route('index');

    // }

    /////////////////////////// Template One /////////////////////////

    

}
