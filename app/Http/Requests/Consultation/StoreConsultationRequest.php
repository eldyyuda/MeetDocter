<?php

namespace App\Http\Requests\Consultation;
use App\Models\MasterData\Consultation;
use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRequest extends FormRequest
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
            'vat'=>[
                'required','string','max:255',
            ],
            'name'=>[
                'required','string','unique:consultation','max:255',
            ]
        ];
    }
}
