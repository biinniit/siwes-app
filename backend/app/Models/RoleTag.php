<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleTag extends Model
{
    use HasFactory;

    protected $table = 'role_tag';

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
