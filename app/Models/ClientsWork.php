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
use Carbon\Carbon;

class ClientsWork extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function works()
    {
        return  $this->belongsTo(Work::class, 'work_id', 'id');
    }

    public function typeworks()
    {
        return  $this->belongsTo(WorksPrice::class, 'type_work_id', 'id');
    }

    public function medicalentity()
    {
        return  $this->belongsTo(MedicalEntity::class, 'medical_entity_id', 'id');
    }

    public function medicalcenter()
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

    public function setStartWorkAttribute($value)
    {
        $this->attributes['start_work'] = $value ? Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d') : null;
    }

    public function getStartWorkAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }

    public function setFinishWorkAttribute($value)
    {
        $this->attributes['finish_work'] = $value ? Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d') : null;
    }

    public function getFinishWorkAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }
}
