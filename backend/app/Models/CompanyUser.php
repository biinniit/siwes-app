<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class CompanyUser extends User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'company_user';

    protected $primaryKey = 'companyUserId';

    public $timestamps = false;

    protected $guarded = ['passwordHash'];

    protected $hidden = ['passwordHash'];

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->passwordHash;
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'companyId');
    }
}
