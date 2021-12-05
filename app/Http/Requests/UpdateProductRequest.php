<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'max:255',
                Rule::unique('products')->ignore($this->product),
            ],
            'category_id' => 'required',
            'image' => 'image',
            'file' => 'mimes:pdf,jpg,jpeg,png,bmp,gif,svg,webp,mp3,mp4|max:16000',
            'description' => 'required',
            'customer_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là trường bắt buộc.', 
            'name.max' => 'Tên sản phẩm không được dài quá :max ký tự.', 
            'name.unique' => 'Tên sản phẩm đã tồn tại.',
            'category_id.required' => 'Danh mục là trường bắt buộc.',
            'image.image' => 'Ảnh không đúng định dạng (jpg, jpeg, png, bmp, gif, svg hoặc webp).',
            'file.mimes' => 'File không đúng định dạng (jpg, jpeg, png, bmp, gif, svg, pdf, mp3, mp4 hoặc webp).',
            'file.max' => 'File không được lớn hơn 16MB.',
            'description.required' => 'Mô tả là trường bắt buộc.',
            'customer_id.required' => 'Khách hàng là trường bắt buộc.',
        ];
    }
}
