<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required|min:3|max:255|string|unique:courses'
        ];
    }

    public function attributes(){
        return[
            'name' => 'nome',
            'description' => 'descrição',
            'image_path' => 'imagem',
            'video_link' => 'link do vídeo',
            'category_id' => 'categoria'
        ];
    }
}
