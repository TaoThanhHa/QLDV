<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoanVienRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'ho_ten' => 'required|max:255',
            'ngay_sinh' => 'nullable|date',
            'ngay_vao_doan' => 'nullable|date',
            'gioi_tinh' => 'nullable|in:Nam,Nữ',
            'dia_chi' => 'nullable|max:255',
            'dien_thoai' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'nullable|email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'ho_ten.required' => 'Họ tên là bắt buộc.',
            'ho_ten.max' => 'Họ tên không được vượt quá 255 ký tự.',
            'dien_thoai.regex' => 'Số điện thoại không hợp lệ.',
            'dien_thoai.min' => 'Số điện thoại phải có ít nhất 10 số.',
            'email.email' => 'Email không hợp lệ.',
        ];
    }
}
