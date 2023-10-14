<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cart_items' =>  ['array'],
            // 'cart_items.*.id' => ['required'],
            // 'cart_items.*.brand' => ['required'],
            // 'cart_items.*.qty' => ['required'],
            // 'cart_items.*.price' => ['required']

        ];
    }
}
