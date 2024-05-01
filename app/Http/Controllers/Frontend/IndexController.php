<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Category;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\Contact;
use App\Models\Admin\Faq;
use App\Models\Admin\MultiImg;
use App\Models\Admin\Product;
use App\Models\Admin\Template;
use App\Models\Banner;
use App\Models\Brand;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Index
    public function Index()
    {
        $template = Template::latest('id')->where('status', '1')->first();

        if ($template->name == 'template_one') {

            return view('frontend.template_one.index_template_one');

        } else if ($template->name == 'template_two') {

            return view('frontend.astell.index_astell');

        } else if ($template->name == 'template_three') {
            $banners = Banner::where('status', '1')->orderBy('id', 'ASC')->latest()->get();
            $categorys = Category::where('status', '1')->orderBy('category_name', 'ASC')->latest()->get();

            return view('frontend.index', compact('banners', 'categorys'));
        }

    }

    //Template OneProduct
    public function TemplateOneProduct($id, $product_slug)
    {
        $product = Product::find($id);

        // $color = $product->color_id;
        // $product_colors = explode(',', $color);

        $multiImages = MultiImg::where('product_id', $product->id)->get();

        //Releted Category
        $cat_id = $product->category_id;
        $relativeProduct = Product::where('category_id', $cat_id)->where('id', '!=', '$id')->orderBy('id', 'ASC')->limit(5)->get();

        $child_id = $product->child_id;
        $relativeChild = Product::where('child_id', $child_id)->where('id', '!=', '$id')->orderBy('id', 'DESC')->limit(8)->get();

        return view('frontend.template_one.product.single_product', compact('product', 'relativeProduct', 'multiImages','relativeChild'));
    }

    //Single Product
    public function SingleProduct($id)
    {
        $product = Product::find($id);

        $color = $product->color_id;
        $product_colors = explode(',', $color);

        $multiImages = MultiImg::where('product_id', $product->id)->get();

        //Related product
        $cat_id = $product->category_id;
        $relativeProduct = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'ASC')->limit(5)->get();

        return view('frontend.pages.product.single_product', compact('product', 'multiImages', 'relativeProduct', 'product_colors'));
    }

    //Faq
    public function Faq()
    {
        $faqs = Faq::where('status', '1')->orderBy('order', 'ASC')->latest()->get();
        return view('frontend.pages.setting.faq', compact('faqs'));
    }

    //ContactUser
    public function ContactUser()
    {
        return view('frontend.pages.setting.contact_user');
    }

    //ContactUser
    public function SendMessage(Request $request)
    {
        // $validator = $request->validate(

        //     [
        //         'name' => 'required|max:120',
        //         'email' => 'required|email',
        //         'phone' => 'required|min:11|numeric',
        //         'message' => 'required',
        //     ],

        //     [
        //         'name.required' => 'Name is required',
        //         'email.required' => 'Email is required',
        //         'phone.required' => 'Phone is required',
        //         'message.required' => 'Message is required',
        //     ],
        // );

        // MSG-240324-2

        $typePrefix = 'MSG';

        $today = date('dmy');

        $lastCode = Contact::where('code', 'like', $typePrefix . '-' . $today . '%')
            ->orderBy('id', 'desc')
            ->first();

        $newNumber = $lastCode ? (int) explode('-', $lastCode->code)[2] + 1 : 1;

        $code = $typePrefix . '-' . $today . '-' . $newNumber;

        Contact::insert([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
            'code' => $code,

        ]);

        toastr()->success('Message Send Successfully');
        return redirect()->back();
    }

    //Brand Page
    public function BrandPage()
    {
        $brands = Brand::where('status', '1')->orderBy('brand_name', 'ASC')->latest()->get();
        return view('frontend.pages.product.brand_page', compact('brands'));
    }

    //Brand Page
    public function BrandWiseProduct($id)
    {
        $products = Product::where('brand_id', $id)->paginate(3);
        $brandname = Brand::where('id', $id)->first();

        return view('frontend.pages.product.brand_wise_product', compact('products', 'brandname'));
    }

    //About Page
    public function AboutPage()
    {
        $about = About::where('status', 'tamplate_one')->find(1);

        return view('frontend.pages.about_page', compact('about'));
    }

    
}
