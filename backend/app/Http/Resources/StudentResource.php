<?php

namespace App\Http\Resources;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'studentId' => $this->studentId,
            'firstName' => $this->firstName,
            'middleName' => $this->middleName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'programId' => $this->programId,
            'programTitle' => empty($this->programId) ? null : Program::find($this->programId)->title,
            'address' => $this->address
        ];
    }
}
