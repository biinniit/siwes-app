<?php

namespace App\Http\Resources;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'roleId' => $this->roleId,
            'companyId' => Branch::find($this->branchId)->companyId,
            'branchId' => $this->branchId,
            'title' => $this->title,
            'remuneration' => +$this->remuneration,
            'remunerationCycle' => $this->remunerationCycle,
            'slots' => $this->slots
        ];
    }
}
