<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest {
    public function authorize(): bool { return true; }
    public function rules(): array {
        $id = $this->route('product')->id ?? null;
        return [
            'name' => 'required|string|max:255',
            'slug' => "nullable|string|max:255|unique:products,slug,$id",
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'images.*' => 'nullable|image|max:2048',
            'remove_image_ids' => 'array',
            'remove_image_ids.*' => 'integer|exists:product_images,id',
        ];
    }
}
