<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';

    protected $primaryKey = 'companyId';

    public $timestamps = false;

    public function logo(): BelongsTo
    {
        return $this->belongsTo(File::class, 'logoId');
    }

    public function branch(): HasMany
    {
        return $this->hasMany(Branch::class, 'companyId');
    }

    public function companyImage(): HasMany
    {
        return $this->hasMany(CompanyImage::class, 'companyId');
    }
}
