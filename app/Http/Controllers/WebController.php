<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Customer;
use App\Models\News;
use App\Models\Product;
use App\Models\Info;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\Auth\LoginRequest;
use DB;
use Auth;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PostProductRequest;
use App\Mail\ResetPasswordCustomer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class WebController extends Controller
{
    public function index()
    {
    	$latest_news = News::limit(4)->latest()->get();

    	$data = [
    		'latest_news' => $latest_news,
    	];

    	return view('web.index', $data);
    }

    public function search(Request $request)
    {
        $products = Product::paginate(8);

        if ($request->search) {
            $products = Product::where('name', 'like', '%'.$request->search.'%')->paginate(8);
            $products->appends(['search' => $request->search]);
        }

        $data = [
            'products' => $products
        ];

        return view('web.search', $data);
    }

    public function categoryProduct($id)
    {
    	$category = Category::findOrFail($id);
    	$products = $category->products()->where('status', 1)->paginate(9);

    	$data = [
    		'category' => $category,
    		'products' => $products,
    	];

    	return view('web.category-product', $data);
    }

    public function categoryNews($id)
    {
    	$category = Category::findOrFail($id);
    	$posts = News::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(9);
    	$random_news = News::inRandomOrder()->limit(5)->get();

    	$data = [
    		'category' => $category,
    		'posts' => $posts,
    		'random_news' => $random_news,
    	];

    	return view('web.category-news', $data);
    }

    public function newsDetail($id)
    {
    	$news = News::findOrFail($id);
    	$random_news = News::inRandomOrder()->limit(5)->get();
    	$orther_news = News::inRandomOrder()->limit(3)->get();

    	$data = [
    		'news' => $news,
    		'random_news' => $random_news,
    		'orther_news' => $orther_news,
    	];

    	return view('web.news-detail', $data);
    }

    public function contact()
    {
    	$info = Info::findOrFail(1);

    	$data = [
    		'info' => $info,
    	];

    	return view('web.contact', $data);
    }

    public function postContact(StoreContactRequest $request)
    {
    	try {
            DB::beginTransaction();
            
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'content' => $request->content,
                'phone_number' => $request->phone_number,
            ]);

            DB::commit();
            return redirect()->back()->with('alert-error','G???i ph???n h???i th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','G???i ph???n h???i th???t b???i!');
        }
    }

    public function productDetail($id)
    {
    	$product = Product::findOrFail($id);

    	$data = [
    		'product' => $product,
    	];

    	return view('web.product-detail', $data);
    }

    public function login()
    {
    	return view('web.login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            // $request->session()->regenerate();

            // return redirect()->intended('/');
            return redirect()->route('web.index')->with('alert-success','????ng nh???p th??nh c??ng!');
        }

        return back()->withErrors([
            'email' => 'Email ho???c m???t kh???u kh??ng ????ng!',
        ]);
    }

    public function logout() {
        auth()->guard('web')->logout();
        return redirect()->intended('/');
    }

    public function register()
    {
    	return view('web.register');
    }

    public function postRegister(StoreCustomerRequest $request) 
    {
        try {
            DB::beginTransaction();
            
            $file_path = '';
            if ($request->file('avatar')) {
                $name = time().'_'.$request->avatar->getClientOriginalName();
                $file_path = 'uploads/avatar/customer/'.$name;
                Storage::disk('public_uploads')->putFileAs('avatar/customer', $request->avatar, $name);
            }
            
            $customer = Customer::create([
                'code' => '',
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'gender' => $request->gender,
                'birthday' => date("Y-m-d", strtotime($request->birthday)),
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'avatar' => $file_path,
            ]);

            $customer->update([
                'code' => 'KH'.str_pad($customer->id, 6, '0', STR_PAD_LEFT)
            ]);
            
            DB::commit();
            return redirect()->route('web.login')->with('alert-success','????ng k?? th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','????ng k?? th???t b???i!');
        }
    }

    public function profile()
    {
        return view('web.profile');
    }

    public function viewChangePassword() 
    {
        return view('web.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {

        try {
            DB::beginTransaction();
            $customer = auth()->guard('web')->user();

            if (Hash::check($request->password_old, $customer->password)) {
                $customer->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            
            DB::commit();
            return redirect()->route('web.index')->with('alert-success','?????i m???t kh???u th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','?????i m???t kh???u th???t b???i!');
        }
    }
    
    public function viewPostProduct() 
    {
        return view('web.post-product');
    }

    public function postProduct(PostProductRequest $request)
    {
        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                $name = time().'_'.$request->image->getClientOriginalName();
                $file_path_image = 'uploads/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('product', $request->image, $name);
            }

            if ($request->file('file')) {
                $name = time().'_'.$request->file->getClientOriginalName();
                $file_path_file = 'uploads/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('product', $request->file, $name);
            }
            
            $product = Product::create([
                'code' => '',
                'name' => $request->name,
                'image' => $file_path_image,
                'file' => $file_path_file,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'customer_id' => auth()->guard('web')->user()->id,
            ]);

            $product->update([
                'code' => 'SP'.str_pad($product->id, 6, '0', STR_PAD_LEFT)
            ]);
            
            DB::commit();
            return redirect()->route('web.index')->with('alert-success','????ng s???n ph???m th??nh c??ng! S???n ph???m c???a b???n ??ang ch??? x??t duy???t!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','????ng s???n ph???m th???t b???i!');
        }
    }

    public function viewForgotPassword()
    {
        return view('web.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $user = Customer::where('email', $request->email)->first();

        if ($user) {
            $password = Str::random(8);
            $user->update([
                'password' => bcrypt($password)
            ]);

            Mail::to($user->email)->send(new ResetPasswordCustomer($user, $password));

            return redirect()->back()->with('alert-success','M???t kh???u m???i ???? ???????c g???i t???i ?????a ch??? Email c???a b???n! Vui l??ng ki???m tra ????? l???y m???t kh???u m???i.');
        }
        else {
            return redirect()->back()->with('alert-error','Kh??ng t??m th???y t??i kho???n trong h??? th???ng!');
        }
    }
}
