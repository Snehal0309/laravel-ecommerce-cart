<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AddCartItemRequest extends FormRequest {
    public function authorize(): bool { return true; }
    public function rules(): array {
        return [
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1|max:999',
        ];
    }
}
