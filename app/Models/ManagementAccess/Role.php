<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'role';

    protected $dates = [
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'delete_at'
    ];
    public function roleUser()
    {
        return $this->hasMany('App\Models\ManagementAccess\RoleUser','role_id');
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function permission()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Permission');
    }
    public function permissionRole()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'role_id');
    }

}
