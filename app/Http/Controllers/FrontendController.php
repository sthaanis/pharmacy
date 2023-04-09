<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Auth;
use DB;
use Str;
class FrontendController extends Controller
{
    public function index()
    {
        $brand = Brand::where('status', 'active')->get();
        $slider = Slider::all();
        $featured = Product::where('is_featured', 'yes')->get();
        $newArrivals = Product::where('is_topselling', 'yes')->get();
        return view('front.index', ['brands' => $brand, 'sliders' => $slider, 'featuredProducts' => $featured,'newArrivals' => $newArrivals]);
    }

    public function productDetail($id)
    {
        $product = Product::where('id', $id)->first();
        return view('front.product.detail', ['product' => $product]);
    }

    public function register(Request $request)
  {
    $user = new User();
    $user->email = $request->get('email');
    $user->password =$request->get('password');
    $user->save();
    return redirect()->back();
  }


   public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
           return redirect()->back();
        }

        return back()->with([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back();
    }

    public function addToCart(Request $request){
        $productID = $request->get('product_id');
        $userID = Auth::user()->id;
        $quantity = $request->get('qty');
        
        $cart = new Cart();
        $cart->product_id = $productID;
        $cart->user_id = $userID;
        $cart->quantity= $quantity;
        $cart->save();
        return redirect()->back();
    }

    public function myAccount(){
        $order = Order::where('user_id',Auth::user()->id)->get();

        $order = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('user_id', Auth::user()->id)
            ->select('orders.*', 'products.product_name', 'products.mrp', 'products.image')
            ->get();
        return view('front.myaccount',['orders'=>$order]);
    }

    public function viewCart(){
        if(Auth::check()){
            $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('user_id', Auth::user()->id)
            ->select('carts.*', 'products.product_name', 'products.mrp', 'products.image')
            ->get();
            return view('front.cart',['products'=>$cartItems]);
        }
    }

    public function placeOrder(Request $request){
        $qty = $request->get('qty');
        $productID = $request->get('product_id');
        $payment = $request->get('payment');
        // dump($payment);
        for($i=0; $i<count($productID); $i++){
            $order = new Order();
            $order->order_no = Str::random(10);
            $order->product_id = $productID[$i];
            $order->user_id = Auth::user()->id;
            $order->quantity = $qty[$i];
            $order->payment_method = $payment;
            $order->status = 'pending';
            $order->save();
        }
        Cart::where('user_id',Auth::user()->id)->delete();
        return redirect()->back()->with("message","Order Placed Successfully");
    }

    public function removeItem(Request $request)
    {
        $itemId = $request->input('itemId');
        $item = Cart::find($itemId);
        if ($item) {
            $item->delete();
            return response('Item removed from cart.', 200);
        } else {
            return response('Error removing item from cart.', 500);
        }
    }

    public function shop(){
        $product = Product::latest()->get();
        return view('front.shop.shop',['products'=>$product]);
    }

    public function medicine(){
        return view('front.shop.medicine');
    }


    public function shopByCategory(){
        return view('front.shop.category');
    }
    

    public function shopByBrand(){
        return view('front.shop.brand');
    }

    public function newArrival(){
        $product = Product::where('is_topselling','yes')->latest()->get();
        return view('front.shop.newarrival',['products'=>$product]);
    }
}

