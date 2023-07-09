<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;

    protected $table = 'file';

    protected $primaryKey = 'fileId';

    public $timestamps = false;

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'logoId');
    }

    public function studentProfilePicture(): HasOne
    {
        return $this->hasOne(Student::class, 'profilePictureId');
    }

    public function studentResume(): HasOne
    {
        return $this->hasOne(Student::class, 'resumeId');
    }
}
