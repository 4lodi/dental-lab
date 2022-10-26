<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ClientsWork;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function doctors()
    {
        return  $this->hasMany(ClientsWork::class, 'doctor_id');
    }

    public function medicalCenter()
    {
        return  $this->belongsTo(MedicalCenter::class, 'medical_center_id', 'id');
    }
}
