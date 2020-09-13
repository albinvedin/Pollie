<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePoll extends FormRequest
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
            'question'        => 'required|string',
            'multiple_choice' => 'sometimes|boolean',
            'private'         => 'sometimes|boolean',
            'starts_at'       => 'sometimes|date',
            'ends_at'         => 'sometimes|date',
            'options'         => 'required|array|min:2',
            'options.*'       => 'sometimes|string|distinct'
        ];
    }

    /**
     * Filter the options that are NULL.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function getValidatorInstance()
    {
        $this->request->set('options', collect($this->request->get('options'))->filter()->toArray());

        return parent::getValidatorInstance();
    }
}
