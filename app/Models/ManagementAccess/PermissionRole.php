<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'permission_role';

    protected $dates = [
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'permision_id',
        'role_id',
        'created_at',
        'updated_at',
        'delete_at'
    ];
    public function permission()
    {
        return $this->belongsTo(Permission::class,'permision_id');
    }
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
}
