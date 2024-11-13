<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncidentReportRequest extends FormRequest
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
            'report' => ['required'],
            'disposition' => ['required'],
            'caseNumber' => ['required'],
            'action' =>['required'],
            'location' => ['required'],
            'uploadedBy' => ['required'],
            'frequency' => ['required'],
            'incidentReoccured' => ['required'],
            'incidentFileId' =>['required'],
            'incidentStatusId' => ['required'],
            'userId' => ['required'],
            'campusId' => ['required'],
            'buildingId' => ['required'],
            'incidentTypeId' => ['required']
        ];
    } else {
        return [
            'report' => ['sometimes','required'],
            'disposition' => ['sometimes','required'],
            'caseNumber' => ['sometimes','required'],
            'action' =>['sometimes','required'],
            'location' => ['sometimes','required'],
            'uploadedBy' => ['sometimes','required'],
            'frequency' => ['sometimes','required'],
            'incidentReoccured' => ['sometimes','required'],
            'incidentFileId' =>['sometimes','required'],
            'incidentStatusId' => ['sometimes','required'],
            'userId' => ['sometimes','required'],
            'campusId' =>['sometimes','required'],
            'buildingId' => ['sometimes','required'],
            'incidentTypeId' => ['sometimes','required']
        ];
    }
}



    protected function prepareForValidation() {
        $this->merge([
            'case_number'=>$this->caseNumber,
            'uploaded_by'=>$this->uploadedBy,
            'incident_reoccured' => $this -> incidentReoccured,
            'incident_file_id' => $this -> incidentFileId,
            'incident_status_id' => $this -> incidentStatusId,
            'user_id' => $this -> userId,
            'campus_id'=>$this->campusId,
            'building_id'=>$this->buildingId,
            'incident_type_id' => $this -> incidentTypeId,
        ]);
    }

}