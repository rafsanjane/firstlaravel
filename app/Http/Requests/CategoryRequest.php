<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rules = [
            'category_name'   => ['required', 'string', 'max:80', 'unique:categories,name'],
            'categories_icon' => ['required', 'image', 'mimes:jpg,png,svg'],
            'status'          => ['required', 'in:0,1'],
        ];
        if (request()->update_id) {
            $rules['category_name'][3] = 'unique:categories,name,' . request()->update_id;
        }
        return $rules;
    }
}
