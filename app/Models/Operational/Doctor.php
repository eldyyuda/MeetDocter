<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Doctor extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'doctor';

    protected $dates = [
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'specialist_id',
        'photo',
        'name',
        'photo',
        'fee',
        'created_at',
        'updated_at',
        'delete_at'
    ];
    public function specialist()
    {
        return $this->belongsTo(Specialist::class,'specialist_id');
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class,'appointment_id','id');
    }
}
