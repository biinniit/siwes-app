<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory;

    protected $table = 'program';

    protected $primaryKey = 'programId';

    public $timestamps = false;

    public function student(): HasMany
    {
        return $this->hasMany(Student::class, 'programId');
    }
}
