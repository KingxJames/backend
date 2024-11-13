<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBuildingRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT') {
        return [
            //
            'name'=>['required'],
            'buildingLocation'=>['required'],
            'campusId'=>['required']
        ];
    } else {
        return [
            'name'=>['sometimes', 'required'],
            'buildingLocation'=>['sometimes', 'required'],
            'campusId'=>['sometimes', 'required']
        ];
    }
}


    protected function prepareForValidation() {
        $this->merge([
            'building_location'=>$this->buildingLocation,
            'campus_id'=>$this->campusId 
        ]);
    }
}
