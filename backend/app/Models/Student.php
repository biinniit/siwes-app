<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'student';

    protected $primaryKey = 'studentId';

    public $timestamps = false;

    protected $guarded = ['passwordHash', 'profilePictureId', 'resumeId'];

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

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'programId');
    }

    public function profilePicture(): BelongsTo
    {
        return $this->belongsTo(File::class, 'profilePictureId');
    }

    public function resume(): BelongsTo
    {
        return $this->belongsTo(File::class, 'resumeId');
    }
}
