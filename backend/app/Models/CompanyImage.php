<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyImage extends Model
{
    use HasFactory;

    protected $table = 'company_image';

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
