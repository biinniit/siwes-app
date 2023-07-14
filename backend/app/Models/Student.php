<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';

    protected $primaryKey = 'studentId';

    public $timestamps = false;

    protected $guarded = ['passwordHash', 'profilePictureId', 'resumeId'];

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
