<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'summary' => 'required',
            'category_id' => 'required',
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề là trường bắt buộc.', 
            'title.max' => 'Tiêu đề không được dài quá :max ký tự.', 
            'content.required' => 'Mô tả là trường bắt buộc.', 
            'summary.required' => 'Tóm tắt là trường bắt buộc.', 
            'category_id.required' => 'Danh mục là trường bắt buộc.', 
            'image.image' => 'Ảnh không đúng định dạng (jpg, jpeg, png, bmp, gif, svg hoặc webp).',
        ];
    }
}
