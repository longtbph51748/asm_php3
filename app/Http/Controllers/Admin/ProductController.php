<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductResquest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')  // Giả sử Product có quan hệ với Category
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductResquest $request)
    {
        $request->all();
        $data = $request->all();

        // xử lí hình ảnh
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
        }
        $data['image'] = $path_image ?? '';


        //DB::table('products')->insert($data);// đây là query builder
        Product::query()->create($data); // Eloquent ORM

        // Chuyển hướng sau khi thêm thành công
        return redirect()->route('products.index')->with('message', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

    // Trả về view với sản phẩm đã tìm thấy.
        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('backend.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductResquest $request, string $id)
    {
        // Lấy dữ liệu của sản phẩm cần cập nhật
        $product = Product::findOrFail($id);  // Sử dụng findOrFail để trả về lỗi nếu không tìm thấy sản phẩm

        // Lấy dữ liệu từ form
        $data = $request->all();

        // Kiểm tra nếu có file hình ảnh mới
        if ($request->hasFile('image')) {
            // Lưu hình ảnh mới vào thư mục 'images' và lấy đường dẫn
            $path_image = $request->file('image')->store('images', 'public');
            // Cập nhật đường dẫn hình ảnh vào mảng dữ liệu
            $data['image'] = $path_image;
        }

        // Cập nhật thông tin sản phẩm
        $product->update($data);
        return redirect()->route('products.index')->with('message', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // Xóa sản phẩm khỏi cơ sở dữ liệu
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Xóa dữ liệu thành công');
    }

    public function category($id)
    {
        // Lấy danh mục hiện tại
        $category = DB::table('categories')->where('id', $id)->first();

        if (!$category) {
            abort(404);
        }

        // Lấy sản phẩm thuộc danh mục
        $products = DB::table('products')
            ->where('category_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('frontend.phoneCategory', compact('category', 'products'));
    }
}
