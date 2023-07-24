<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyUser extends Model
{
    use HasFactory;

    protected $table = 'company_user';

    protected $primaryKey = 'companyUserId';

    public $timestamps = false;

    protected $guarded = ['passwordHash'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'companyId');
    }
}
