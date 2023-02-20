<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\ProductUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ApiProductController extends Controller
{
    public function products(){
        $products = Product::all();
        return ProductResource::collection($products);
    }
    public function categories(){
        $categories = Category::all();
        return CategoriesResource::collection($categories);
    }
    public function show($id){
        $product = Product::find($id);
        if ($product ==null) {
            return response()->json([
                "msg"=>"product not found"
            ]);
        }
        return new ProductResource($product);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "title"=>"required|string|max:155",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "rate"=>"required|numeric",
            "image"=>"required|image|mimes:png,jpg",
            "category_id"=>"required|exists:categories,id",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg"=>$validator->errors()
            ]);
        }

        $image = Storage::putFile("products",$request->image);
        $product  = Product::create([
            "title"=>$request->title,
            "desc"=>$request->desc,
            "price"=>$request->price,
            "rate"=>$request->rate,
            "image"=>$image,
            "category_id"=>$request->category_id,
        ]);

        return response()->json([
            "msg"=>"product inserted successfly",
            "product"=>$product
        ]);
    }

    public function update(Request $request , $id){
        $validator = validator::make($request->all(),[
            "title"=>"required|string|max:155",
            "desc"=>"required|string",
            "price"=>"required|numeric",
            "rate"=>"required|numeric",
            "image"=>"image|mimes:png,jpg",
            "category_id"=>"required|exists:categories,id",
        ]);

        if ($validator->fails()) {
            return response()->json([
                "msg"=> $validator->errors()
            ]);
        }
        $product = Product::find($id);
        if ($request->has('image')) {
            Storage::delete($product->image);
            $image = Storage::putFile('products',$request->image);
        }else{
            $image = $product->image;
        }

        $product->update([
            "title"=>$request->title,
            "desc"=>$request->desc,
            "price"=>$request->price,
            "rate"=>$request->rate,
            "image"=>$image,
            "category_id"=>$request->category_id,
        ]);

        return response()->json([
            "msg"=>"product updated successfly",
            "product"=>$product
        ]);
    }
    public function delete($id){
        $product =Product::find($id);
        if ($product == null) {
            return response()->json([
                "msg"=>"product not found",
            ]);
        } else {
            $product->delete();
            return response()->json([
                "msg"=>"product deleted successfly",
            ]);
        }

    }

    public function addcart($id){
        $user_id = Auth::id();
        $product =Product::find($id);
        if ($product==null) {
            return response()->json([
                "msg"=>"product not found",
            ]);
        }else {
            $product_id = $id;
        }

        ProductUser::create([
            "user_id"=>$user_id,
            "product_id"=>$product_id,
        ]);

        return response()->json([
            "msg"=>"product added to cart successfly",
        ]);
    }

    public function gotocarts(){
        $user = Auth::user();
        $products = $user->product;
        return ProductResource::collection($products);
    }
    public function deletecart($id){
        $user_id = Auth::id();
        $productDelete = ProductUser::where('user_id',$user_id)->where('product_id',$id)->first();
        if ($productDelete) {
            $productDelete->delete();
            return response()->json([
                "msg"=>"cart deleted successfuly"
            ]);
        } else {
            return response()->json([
                "msg"=>"error while delete cart"
            ]);
        }
    }

}
