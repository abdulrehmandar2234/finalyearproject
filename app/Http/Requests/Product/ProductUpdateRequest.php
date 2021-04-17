<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:30',
            'description' => 'nullable|max:50',
            'brand' => 'nullable|max:30',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'unit_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'discount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'product_link' => 'required|url',
            'website_id' => 'required',
            'category_id' => 'required',
            'rating' => 'nullable',
            'last_updated' => 'nullable|date|date_format:m/d/Y',
        ];
    }
}
