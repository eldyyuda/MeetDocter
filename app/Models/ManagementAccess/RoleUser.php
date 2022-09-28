<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'role_user';

    protected $dates = [
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'user_id',
        'role_id',
        'created_at',
        'updated_at',
        'delete_at'
    ];
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
    public function users()
    {
        return $this->belongsTo(Users::class,'user_id');
    }
}
