<?php

namespace App\Http\Requests\CategoryLink;

use Illuminate\Foundation\Http\FormRequest;

class CategoryLinkRequest extends FormRequest
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
            'category_link' => 'required|url|unique:category_links,category_link',
            'website_id' => 'required',
            'category_id' => 'required',
            'request_type' => 'required|string',
            'scrape_method' => 'required|string',
        ];
    }
}
