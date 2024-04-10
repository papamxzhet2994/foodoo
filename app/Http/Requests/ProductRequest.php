<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'shop_id' => 'required',
            'description' => 'required',
            'weight' => 'required',
            'image' => 'required|image'
        ];
    }
}
