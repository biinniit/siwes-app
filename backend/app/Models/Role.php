<?php

namespace App\Models;

use App\Models\Enums\RemunerationCycle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';

    protected $primaryKey = 'roleId';

    public $timestamps = false;

    protected $fillable = ['branchId', 'title', 'remuneration', 'remunerationCycle', 'slots'];

    protected $casts = [
        'remunerationCycle' => RemunerationCycle::class
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branchId');
    }

    public function roleTag(): HasMany
    {
        return $this->hasMany(RoleTag::class, 'roleId');
    }

    public function application(): HasMany
    {
        return $this->hasMany(Application::class, 'roleId');
    }
}
