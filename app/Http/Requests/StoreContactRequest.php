<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|string|email|max:255',
            'content' => 'required',
            'phone_number' => 'required|size:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ và tên là trường bắt buộc.',
            'email.required' => 'Email là trường bắt buộc.',
            'email.email' => 'Email chưa đúng định dạng.',
            'email.string' => 'Email phải là một chuỗi.',
            'email.max' => 'Email không được dài quá :max ký tự.',
            'content.required' => 'Nội dung là trường bắt buộc.',
            'phone_number.required' => 'Số điện thoại là trường bắt buộc.',
            'phone_number.size' => 'Số điện thoại phải là :size số.',
        ];
    }
}
