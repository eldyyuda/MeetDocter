<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'permission';

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
    public function permissionRole()
    {
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole','permission_id');
    }
    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }
}
