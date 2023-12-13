<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        'title'=>'required|unique:articles|min:5',
        'subtitle'=>'required|unique:articles|min:5',
        'body'=>'required|min:10',
        'img'=>'image|required',
        'category'=>'required',
        ];
    }

    public function massages(): array
    {
        return [
            'title.required' => 'Inserire il titolo',
            'title.unique:articles'=>'Il titolo deve essere univoco per questo articolo',
            'title.min:5'=>'Il titolo deve essere di almeno 5 caratteri',

            'subtitle.required' => 'Inserire il sottotitolo',
            'subtitle.unique:articles'=>'Il sottotitolo deve essere univoco per questo articolo',
            'subtitle.min:5'=>'Il titolo deve essere di almeno 5 caratteri',

            'body.required' => 'Inserire il corpo del tuo messaggio',
            'body.min:10'=>'Il titolo deve essere di almeno 10 caratteri',

            'img.image'=> 'Inserire un file immagine (es. PNG,JPEG)',
            'img.required'=>'Inserire un file immagine',
            
            'category.required' => 'Inserire una categoria',
        ];
    }
}
