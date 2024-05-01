<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Category;
use App\Models\Admin\ChildCategory;
use App\Models\Admin\Contact;
use App\Models\Admin\Faq;
use App\Models\Admin\Product;
use App\Models\Brand;
use App\Models\Sites;
use App\Models\User;
use App\Models\User\Order;
use App\Models\User\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class TemplateOneController extends Controller
{
    //Template One All Product
    public function TemplateOneAllProduct()
    {

        $products = Product::query();

        //category filter
        if (!empty($_GET['category'])) {
            $slugs = explode(',', $_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug', $slugs)->pluck('id')->toArray();

            $products = $products->whereIn('category_id', $catIds);
        }

        //brand filter
        if (!empty($_GET['brand'])) {
            $slugs = explode(',', $_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id', $brandIds);
        }

        //sortByProduct
        if (!empty($_GET['sortBy'])) {

            if ($_GET['sortBy'] == 'nameAtoZ') {
                $products = $products->where(['status' => 1])->orderBy('product_name', 'ASC')->paginate(9);

            } elseif ($_GET['sortBy'] == 'nameZtoA') {

                $products = $products->where(['status' => 1])->orderBy('product_name', 'DESC')->paginate(9);

            } else {
                $products = $products->where('status', 1)->orderBy('id', 'DESC')->paginate(9);
            }
        } else {
            $products = $products->where('status', 1)->orderBy('id', 'DESC')->paginate(12);
        }

        $brands = Brand::where('status', '1')->orderBy('brand_name', 'ASC')->latest()->get();
        $categorys = Category::where('status', '1')->orderBy('category_name', 'ASC')->latest()->get();

        return view('frontend.template_one.product.template_one_all_product', compact('products', 'brands', 'categorys'));
    }

    //shopFilter
    public function shopFilter(Request $request)
    {
        //dd($request->all());

        $data = $request->all();

        //filter category
        $catUrl = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category=' . $category;
                } else {
                    $catUrl .= ',' . $category;
                }
            }
        }

        //filter brand
        $brandUrl = "";
        if (!empty($data['brand'])) {
            foreach ($data['brand'] as $brand) {
                if (empty($brandUrl)) {
                    $brandUrl .= '&brand=' . $brand;
                } else {
                    $brandUrl .= ',' . $brand;
                }
            }
        }

        //filter sortBy
        $sortByUrl = "";
        if (!empty($data['sortBy'])) {
            $sortByUrl .= '&sortBy=' . $data['sortBy'];
        }

        return redirect()->route('template.one.all_product', $catUrl . $brandUrl . $sortByUrl);
    }

    //Brand Wise Product One
    public function BrandRelatedProductOne(Request $request, $id, $brand_slug)
    {

        $sort = '';

        if ($request->sort != null) {
            $sort = $request->sort;
        }

        if ($id == null) {
            return redirect()->route('index');
        } else {
            if ($sort == 'nameAtoZ') {
                $products = Product::where(['status' => 1, 'brand_id' => $id])->orderBy('product_name', 'ASC')->paginate(12);
            } elseif ($sort == 'nameZtoA') {
                $products = Product::where(['status' => 1, 'brand_id' => $id])->orderBy('product_name', 'DESC')->paginate(12);
            } else {
                $products = Product::where('status', '1')->where('brand_id', $id)->paginate(12);

            }
        }

        $brandwiseproduct = Brand::find($id);

        $route = 'product/brand';
        $brandId = $id;
        $brandSlug = $brand_slug;

        return view('frontend.template_one.brand.brand_wise_product', compact('products', 'brandwiseproduct', 'route', 'brandId', 'brandSlug', 'sort'));
    }

    //Home All Category
    public function HomeAllCategory()
    {
        $categorys = Category::where('status', '1')->latest()->get();

        return view('frontend.template_one.category.home_all_category', compact('categorys'));
    }

    //Category Wise Product One
    public function CategoryRelatedProductOne(Request $request, $id, $category_slug)
    {

        $sort = '';

        if ($request->sort != null) {
            $sort = $request->sort;
        }

        if ($id == null) {
            return redirect()->route('index');
        } else {
            if ($sort == 'nameAtoZ') {
                $products = Product::where(['status' => 1, 'category_id' => $id])->orderBy('product_name', 'ASC')->paginate(12);
            } elseif ($sort == 'nameZtoA') {
                $products = Product::where(['status' => 1, 'category_id' => $id])->orderBy('product_name', 'DESC')->paginate(12);
            } else {
                $products = Product::where('status', '1')->where('category_id', $id)->paginate(12);

            }
        }

        $catwiseproduct = Category::find($id);

        $route = 'product/category';
        $catId = $id;
        $catSlug = $category_slug;

        return view('frontend.template_one.category.category_wise_product', compact('products', 'catwiseproduct', 'route', 'catId', 'catSlug', 'sort'));
    }

    //Child Category Wise Product One
    public function ChilldCategoryRelatedProductOne(Request $request, $id, $childcategory_slug)
    {

        $sort = '';

        if ($request->sort != null) {
            $sort = $request->sort;
        }

        if ($id == null) {
            return redirect()->route('index');
        } else {
            if ($sort == 'nameAtoZ') {
                $products = Product::where(['status' => 1, 'childcategory_id' => $id])->orderBy('product_name', 'ASC')->paginate(12);
            } elseif ($sort == 'nameZtoA') {
                $products = Product::where(['status' => 1, 'childcategory_id' => $id])->orderBy('product_name', 'DESC')->paginate(12);
            } else {
                $products = Product::where('status', '1')->where('childcategory_id', $id)->paginate(12);
            }
        }

        $route = 'product/childcategory';
        $childcatId = $id;
        $childcatSlug = $childcategory_slug;

        $childcatwiseproduct = ChildCategory::find($id);

        return view('frontend.template_one.childcategory.childcategory_wise_product', compact('products', 'childcatwiseproduct', 'childcatId', 'childcatSlug', 'sort', 'route'));
    }

    //Contact
    public function TemplateOneContact()
    {
        $sites = Sites::find(1);
        return view('frontend.template_one.contact.contact_store', compact('sites'));
    }

    //Template One Contact Store
    public function TemplateOneContactStore(Request $request)
    {
        $validator = $request->validate(

            [
                'name' => 'required|max:120',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
            ],

            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'subject.required' => 'Subject is required',
                'message.required' => 'Message is required',
            ],
        );

        // MSG-240324-2

        $typePrefix = 'MSG';

        $today = date('dmy');

        $lastCode = Contact::where('code', 'like', $typePrefix . '-' . $today . '%')
            ->orderBy('id', 'desc')
            ->first();

        $newNumber = $lastCode ? (int) explode('-', $lastCode->code)[2] + 1 : 1;

        $code = $typePrefix . '-' . $today . '-' . $newNumber;

        if ($validator) {

            Contact::insert([

                'name' => $request->name,
                'email' => $request->email,
                // 'phone' => $request->phone,
                // 'address' => $request->address,
                'subject' => $request->subject,
                'message' => $request->message,
                'code' => $code,
                // 'ip_address' => $request->ip_address,

            ]);

        }

        return back()->with("status", "Message Send Successfully");

    }

    //ProductSearch
    public function ProductSearch(Request $request)
    {

        $request->validate(['search' => "required"]);

        $item = $request->search;

        // $categories = Category::orderBy('category_name', 'ASC')->get();

        $products = Product::where('product_name', 'LIKE', "%$item%")
            ->orWhere('short_desc', "LIKE", "%$item%")
            ->paginate(12);

        return view('frontend.template_one.search.product_search', compact('products', 'item'));

    }

    // //Advance Search
    // public function SearchProduct(Request $request)
    // {

    //     $request->validate(['search' => "required"]);

    //     $item = $request->search;

    //     $products = Product::where('product_name', 'LIKE', "%$item%")->select('product_name', 'product_slug', 'product_image', 'id')->limit(8)->get();

    //     return view('frontend.template_one.search.advanced_search', compact('products'));

    // }

    //Template One Faq
    public function TemplateOneFaq()
    {
        $faqs = Faq::where('status', '1')->orderBy('order', 'ASC')->latest()->get();
        return view('frontend.template_one.faq.faq', compact('faqs'));
    }

    //Template One About
    public function TemplateOneAboutUs()
    {
        $about = About::where('status','tamplate_one')->find(1);
        return view('frontend.template_one.about.about_us',compact('about'));
    }

    //Template One Login
    public function TemplateOneLogin()
    {
        return view('frontend.template_one.user.login');

    }

    //TemplateOneDashboard
    public function TemplateOneDashboard()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('frontend.template_one.user.dashboard',compact('profileData'));
    }

    //Template One ProfileUpdate
    public function TemplateOneProfileUpdate(Request $request)
    {

        $id = Auth::user()->id;
        $update = User::findOrFail($id);

        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->address_two = $request->address_two;

        $update->country = $request->country;
        $update->city = $request->city;
        $update->postal_code = $request->postal_code;

        $update->save();

        toastr()->success('Profile Update Successfully');

        return redirect()->back();
    }

    public function TemplateOnePasswordUpdate(Request $request)
    {
        //validate
        $request->validate([

            'old_password' => 'required',
            'new_password' => [

                'required', 'confirmed',Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers()

            ],
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {

            toastr()->error('Old Password Not Match');

            return redirect()->back();
        }

        //Update New Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        toastr()->success('Password Change Successfully');

        return redirect()->back();
    }

    //Template One UserLogout
    public function TemplateOneUserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toastr()->success('Logout Successfully!!');

        return redirect()->route('index');
    }

    //Template One OrderDetails
    public function TemplateOneOrderDetails($id)
    {
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        $orderitem = OrderItem::with('product')->where('order_id',$id)->orderBy('id', 'DESC')->get();

        return view('frontend.template_one.user.order_details',compact('order','orderitem'));
    }

}
