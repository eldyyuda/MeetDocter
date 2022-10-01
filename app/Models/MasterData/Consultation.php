<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = 'consultation';

    protected $dates = [
        'created_at',
        'update_at',
        'delete_at'
    ];

    protected $fillable = [
        'name',
        'vat',
        'created_at',
        'updated_at',
        'delete_at'
    ];

    public function appointment()
    {
        return $this->hasMany(Appointment::class,'consultation_id');
    }

}
