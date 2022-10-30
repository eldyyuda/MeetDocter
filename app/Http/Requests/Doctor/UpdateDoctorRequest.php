<?php

namespace App\Http\Requests\Doctor;
use App\Models\Operational\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
            'specialist_id'=>[
                'required','integer','max:255',
            ],
            'name'=>[
                'required','string','max:255',
            ],
            'fee'=>[
                'required','string','max:255',
            ],
            'photo'=>[
                'nullable','string','max:1000',
            ],
        ];
    }
}