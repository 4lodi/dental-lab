<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Work;
use App\Models\WorksPrice;
use App\Models\MedicalEntity;
use App\Models\MedicalCenter;
use App\Models\Doctor;
use App\Models\Status;

class ClientsWork extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function works()
    {
        return  $this->belongsTo(Work::class, 'work_id', 'id');
    }

    public function typeWorks()
    {
        return  $this->belongsTo(WorksPrice::class, 'type_work_id', 'id');
    }

    public function medicalEntity()
    {
        return  $this->belongsTo(MedicalEntity::class, 'medical_entity_id', 'id');
    }

    public function medicalCenter()
    {
        return  $this->belongsTo(MedicalCenter::class, 'medical_center_id', 'id');
    }

    public function doctor()
    {
        return  $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    public function status()
    {
        return  $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
