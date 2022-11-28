<?php

namespace App\Http\Requests\Consultation;
use App\Models\MasterData\Consultation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

// use Gate;
class UpdateConsultationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('consultation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
                'required','string','max:255',Rule::unique('consultation')->ignore($this->consultation)
            ]
        ];
    }
}
