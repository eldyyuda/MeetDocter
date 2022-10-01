<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Appointment extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'appointment';

    protected $dates = [
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'delete_at'
    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function consultation()
    {
        return $this->belongsTo(Consultation::class,'consultation_id','id');
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class,'transaction_id');
    }
}
