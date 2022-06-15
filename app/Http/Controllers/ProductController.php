<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Http\Requests\Products\ProductCreateRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Traits\UploadFile;
use Session;

class ProductController extends Controller
{
    use UploadFile;
    public function index()
    {
        $products = Product::paginate(config('constants.paginate.itemcount'));

        return view('products.view-all', compact('products'));
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->with(['images', 'category'])->first();

        if (! $product) {
            abort(404);
        }

        return view('products.single-view', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(ProductCreateRequest $request)
    {
        $product = Product::create([
            "name" => $request->name,
            "category_id" => $request->category,
            "description" => $request->description
        ]);

        $imagesForProduct = [];
        foreach ($request->images as $file) {
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fileSysName = \Str::random().time().'.'.$ext;
            $path = $this->upload($file, $fileSysName);
            $imagesForProduct[] = [
                "product_id" => $product->id,
                "stored_at" => $path
            ];
        }

        if (!ProductImage::insert($imagesForProduct)) {
            abort(500);
        }

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('products.edit', compact('categories', 'product'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->description = $request->description;
        
        if (! $product->update()) {
            abort(500);
        }

        $imagesForProduct = [];
        foreach ($request->images as $file) {
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fileSysName = \Str::random().time().'.'.$ext;
            $path = $this->upload($file, $fileSysName);
            $imagesForProduct[] = [
                "product_id" => $product->id,
                "stored_at" => $path
            ];
        }

        if (!ProductImage::insert($imagesForProduct)) {
            abort(500);
        }

        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        if (! $product->delete()) {
            abort(500);
        }

        Session::flash('success', "Product deleted successfully.");
        return redirect()->back();

    }
}
