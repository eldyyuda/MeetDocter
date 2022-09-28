<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TypeUser extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'type_user';

    protected $dates = [
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'delete_at'
    ];
    // relational at eloquent, from one to many 
    public function detailUser()
    {
        return $this->hasMany(DetailUser::class,'type_user_id','id');
    }

}
