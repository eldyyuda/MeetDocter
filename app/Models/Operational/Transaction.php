<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'transaction';

    protected $dates = [
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'appointment_id',
        'fee_doctor',
        'fee_specialist',
        'fee_hospital',
        'subtotal',
        'vat',
        'total',
        'created_at',
        'updated_at',
        'delete_at'
    ];
    public function appointment()
    {
        return $this->belongsTo(Appointment::class,'appointment_id');
    }
    
}
