<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request)
    {
        if ($request->has('category')) {
            $products = Product::where('category_id', $request->category)->get();
        } else {
            $products = Product::all();
        }
        $categories = Category::all();
        return view('products.shop_products', compact('products', 'categories'));
    }

    public function index()
    {
        $this->middleware('admin');
        $shops = Shop::all();
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories', 'shops'));
    }

    public function delete($id)
    {
        $this->middleware('admin');
        $product = Product::findOrFail($id);
        return view('admin.products.delete', compact('product'));
    }

    public function destroy($id)
    {
        $this->middleware('admin');
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/admin');
    }

    public function search(Request $request)
    {
        $shopId = $request->input('shop');
        $categoryId = $request->input('category');
        $searchTerm = $request->input('search');

        $shop = Shop::findOrFail($shopId);

        // Ищем продукты по названию и привязанным категориям
        $productsQuery = Product::where('shop_id', $shopId)
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%")
                    ->orWhere('description', 'like', "%$searchTerm%");
            });

        if ($categoryId != 0) {
            $productsQuery->where('category_id', $categoryId);
        }

        $products = $productsQuery->get();

        $categories = Category::all();

        return view('products.shop_products', compact('products', 'shop', 'categories'));
    }


    public function showByCategory($shop_id, $category_id)
    {
        $shop = Shop::findOrFail($shop_id);
        if ($category_id == 0) {
            $products = Product::where('shop_id', $shop_id)->get();
            $category = null;
        } else {
            $category = Category::findOrFail($category_id);
            $products = Product::where('shop_id', $shop_id)->where('category_id', $category_id)->get();
        }
        $categories = Category::all();
        return view('products.shop_products', compact('products', 'category', 'shop', 'categories'));
    }


    public function resetCategory(Request $request)
    {
        $shop = Shop::findOrFail($request->shop);
        $category = Category::all();
        $request->session()->forget('category');
        return redirect()->route('products.shop_products', compact('shop', 'category'));
    }

    public function create()
    {
        $this->middleware('admin');
        $categories = Category::all();
        $shops = Shop::all();
        return view('admin.products.create', compact('categories', 'shops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,heic|max:4096',
            'description' => 'required',
        ]);


        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $this->uploadPhoto($request);
        $product->weight = $request->weight;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->shop_id = $request->shop;
        $product->save();
        return back()
            ->with('success','Продукт успешно создан.');
    }

    public function uploadPhoto(Request $request)
    {
        $path = $request->file('image')->store('images/products/', 'public');
        return $path;
    }
}
