<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IncidentReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'report'=>$this->report,
            'disposition'=>$this->disposition,
            'caseNumber'=>$this->case_number,
            'action'=>$this->action,
            'location'=>$this->location,
            'uploadedBy'=>$this->uploaded_by,
            'frequency'=>$this->frequency,
            'incidentReoccured'=>$this->incident_reoccured,
            'incidentFileId'=>$this->incident_file_id,
            'incidentStatusId'=>$this->incident_status_id,
            'userId'=>$this->user_id,
            'campusId'=>$this->campus_id,
            'buildingId'=>$this->building_id,
            'incidentTypeId'=>$this->incident_type_id
        ];
    }
}