<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branch';

    protected $primaryKey = 'branchId';

    public $timestamps = false;

    protected $fillable = ['companyId', 'name', 'address', 'phone'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'companyId');
    }

    public function role(): HasMany
    {
        return $this->hasMany(Role::class, 'branchId');
    }
}
