<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); // Lấy tất cả danh mục
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        DB::table('categories')->insert($data);
        return redirect()->route('categories.index')->with('message', 'Thêm sản phẩm thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Danh mục không tồn tại!');
        }
    
        // Kiểm tra xem danh mục có sản phẩm nào không
        $productCount = Product::where('category_id', $id)->count();
    
        if ($productCount > 0) {
            return redirect()->route('categories.index')->with('error', 'Không thể xóa danh mục vì có sản phẩm liên quan!');
        }
    
        // Xóa danh mục
        $category->delete();
    
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công!');
    }

}