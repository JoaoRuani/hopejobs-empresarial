<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $company = $this->company;
        return [
            'id' => $this->id,
            'salary' => $this->salary,
            'responsibilities' => $this->responsibilities,
            'hiringType' => [
                'id' => $this->hiringType,
                'description' => $this->hiringType->description
            ],
            'benefits' => $this->benefits,
            'observations' => $this->observations,
            'title' => $this->title,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'company' => [
                'id' => $company->id,
                'name' =>  $company->trading_name,
                'logo' => $company->image->url
            ],
            'job_role' => [
                'id' => $this->jobRole->id,
                'name' => $this->jobRole->name
            ],
        ];
    }
}
