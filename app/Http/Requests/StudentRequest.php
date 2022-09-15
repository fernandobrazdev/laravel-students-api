<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        return $this->isMethod('POST') ? $this->store() : $this->update();
    }

    protected function store()
    {
        return [
            'nome' => 'required|max:255',
            'email' => 'required|email',
            'ra' => 'required|integer|unique:students,ra',
            'cpf' => 'required|size:14|unique:students,cpf',
        ];
    }

    protected function update()
    {
        return [
            'nome' => 'required|max:255',
            'email' => 'required|email',
        ];
    }
}
