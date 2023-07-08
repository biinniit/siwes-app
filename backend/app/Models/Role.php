<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';

    public $timestamps = false;

    public function roleTag()
    {
        return $this->hasMany(RoleTag::class, 'roleId');
    }

    public function application()
    {
        return $this->hasMany(Application::class, 'roleId');
    }
}
