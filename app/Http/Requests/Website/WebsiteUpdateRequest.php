<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteUpdateRequest extends FormRequest
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
            'name' => 'required|unique:websites,name,' . $this->website->id,
            'logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'currency_id' => 'required',
            'link' => 'required|url',
        ];
    }
}
