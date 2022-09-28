<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Specialist extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'specialist';

    protected $dates = [
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
        'delete_at'
    ];
    public function doctor()
    {
        return $this->hasMany(Doctor::class,'specialist_id','id');
    }
}
