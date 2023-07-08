<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    public $timestamps = false;

    public function companyImage()
    {
        return $this->hasMany(CompanyImage::class, 'companyId');
    }
}
