<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'integer'],
            'category_id' => ['required', 'integer']
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
                'name.max' => 'Tên sản phẩm không quá 255 ký tự',
                'name.regex' => 'Tên sản phẩm chỉ được chứa chữ cái, số và khoảng trắng',
                'image.image' => 'Hình ảnh không đúng định dạng',
                'image.mimes' => 'Hình ảnh không đúng định dạng',
                'price.required' => 'Giá sản phẩm không được để trống',
                'price.numeric' => 'Giá sản phẩm không đúng định dạng',
                'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 0',
                'stock.required' => 'Số lượng sản phẩm không được để trống',
                'stock.integer' => 'Số lượng sản phẩm không đúng định dạng',
                'stock.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 0',
                'category_id.required' => 'Danh mục không được để trống',
                'category_id.exists' => 'Danh mục không hợp lệ',
                'description.max' => 'Mô tả sản phẩm không được vượt quá 1000 ký tự',
        ];
    }
}
