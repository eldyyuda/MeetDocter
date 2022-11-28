<?php

namespace App\Http\Requests\Specialist;
use App\Models\MasterData\Specialist;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateSpecialistRequest extends FormRequest
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
        abort_if(Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return [
            'name'=>[
                'required','string','max:255',Rule::unique('specialist')->ignore($this->specialist)
            ],
            'price'=>[
                'required','string','max:255',
            ], 
        ];
    }
}
