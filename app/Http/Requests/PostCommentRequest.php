<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'bail|required',
            'content' => 'required',
            // 'post_id' => 'required|exists:posts,id'
        ];
    }

    function messages()
    {
        return [
            'user_id.required' => 'You should add your name',
            // 'post_id.exists' => 'Dont change the post id :D',
        ];
    }
}
