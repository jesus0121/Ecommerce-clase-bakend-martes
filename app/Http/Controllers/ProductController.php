<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(Request $request)
    {
        $categories = Category::all();

        $categoryId = $request->get('category');

        $query = Product::with(['brand', 'category'])
            ->orderBy('id', 'desc');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }
        
        $products = $query->paginate(12);

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $categoryId
        ]);
    }

    function detail($id, $category = null)
    {
        if ($category != null) {
            return view("products.detail", [
                'id' => $id,
                'category' => $category
            ]);
        } else {
            return view("products.detail", compact('id','category'));
        }
    }

    function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view("products.create", [
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:999999.99',
            'category' => 'required|exists:categories,id',
            'brand' => 'required|exists:brand,id',
        ]);

        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category');
        $product->brand_id = $request->get('brand');

        $product->save();

        return redirect() ->route('admin.products.table');
    }
    public function table(){

        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('products.table',[
            'products' => $products
        ]);
    }

    function delete(product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}