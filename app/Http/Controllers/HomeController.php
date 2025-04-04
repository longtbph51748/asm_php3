<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function phoneCategory($id)
    {
        // Kiểm tra danh mục có tồn tại không
        $category = DB::table('categories')->where('id', $id)->first();
        if (!$category) {
            abort(404);
        }

        // Lấy danh sách sản phẩm thuộc danh mục
        $products = DB::table('products')
            ->where('category_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(12);

        // Lấy danh sách tất cả danh mục
        $categories = DB::table('categories')->get();

        return view('frontend.phoneCategory', compact('category', 'products', 'categories'));
    }

    public function login()
    {
        return view('frontend.login');
    }
}

