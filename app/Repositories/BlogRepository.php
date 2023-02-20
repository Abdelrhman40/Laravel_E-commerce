<?php

namespace App\Repositories;


use App\Models\Product;
use App\Models\Category;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    public function adminPage(){
        $products = Product::paginate(6);
        return view('products.admin_page',["products"=>$products]);
    }
    public function home(){
        $products = Product::all();
        return view('products.home',["products"=>$products]);
    }
    public function products(){
        $products = Product::all();
        $categories= Category::all();
        //dd($categories);
        return view('products.products',["products"=>$products,"categories"=>$categories]);
    }
    public function create(){
        $categories= Category::all();
        return view('products.create',["categories"=>$categories]);
    }
    public function store(Request $request){
        //validation
        $data= $request->validate([
            "title"=>"required|string|max:155",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "rate"=>"required|numeric",
            "image"=>"required|image|mimes:png,jpg",
            "category_id"=>"required|exists:categories,id",
        ]);
        //store
        $data['image']=Storage::putFile("products",$request->image);
        Product::create($data);
        session()->flash("success","product added successfuly");
        //redirect
        return redirect(url('/adminPage'));
    }
    public function show($id){
        $product=Product::findOrfail($id);
        $qrcode = QrCode::generate(redirect(url("/show/$id")));
        return view('products.show',["product"=>$product ,"qrcode"=>$qrcode ]);
    }
    public function showadmin($id){
        $product=Product::findOrfail($id);
        return view('products.showForAdmin',["product"=>$product]);
    }
    public function edit($id){
        $product = Product::findOrfail($id);
        $categories= Category::all();
        return view('products.edit' , ["product"=>$product,"categories"=>$categories]);
    }
    public function update(Request $request , $id)
    {
        //validation

        $data = $request->validate([
            "title"=>"required|string|max:155",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "rate"=>"required|numeric",
            "image"=>'image|mimes:png,jpg,jpeg',
            "category_id"=>"required|exists:categories,id",
        ]);

        //select & update
        $product = Product::findOrFail($id);//->update($data);

        if ($request->has('image')) {
            Storage::delete($product->image);
            $data['image']=Storage::putFile("products",$data['image']);
        }

        //or update only
        $product ->update($data);
        session()->flash("success","data updated successfly");

        return redirect(url("/showadmin/$product->id"));
        //redirect
        //return redirect(url("categories"));
    }

    public function delete($id){
        $product = Product::findOrfail($id);
        $product->delete();
        session()->flash("success","product deleted successfly");
        return redirect()->action([ProductsController::class,'adminPage']);
    }

    public function filter($val){
        if ($val=="*") {
            $products = Product::all();
        }else {
            $products = Product::where("category_id",$val)->get();
        }

        return view("products.products",["products"=>$products]);
    }

    public function addcart($id){
        $user_id = Auth::user()->id;
        $product_id = $id;
        ProductUser::create(["product_id"=>$product_id,"user_id"=>$user_id]);
        return Redirect::back();
    }

    public function gotocart(){
        $carts = ProductUser::where("user_id",Auth::user()->id);
        $numOfProduct = $carts->count();
        $products = Auth::user()->product;
        $totalPrice = $products->sum('price');
        //dd($totalPrice);
        return view("products.carts",["numOfProduct"=>$numOfProduct,"products"=>$products,"totalPrice"=>$totalPrice]);
    }

    public function deletecart($id){
        $user_id = Auth::user()->id;
        $product = ProductUser::where("product_id",$id)->where("user_id",$user_id)->first();
        //dd($product);
        $product->delete();
        return Redirect::back();
    }

}
