<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = 'application';

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
