<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ClientsWork;

class MedicalCenter extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function medicalCenters()
    {
        return  $this->hasMany(ClientsWork::class, 'medical_center_id');
    }

    public function medicalEntity()
    {
        return  $this->belongsTo(MedicalEntity::class, 'medical_entity_id', 'id');
    }
}
