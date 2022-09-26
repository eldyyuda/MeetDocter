<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'detail_user';

    protected $dates=[
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'user_id',
        'type_user_id',
        'contact',
        'address',
        'phone',
        'gender',
        'created_at',
        'updated_at',
        'delete_at'
    ];
}
