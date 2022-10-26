<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClientsWork;
use Illuminate\Database\Eloquent\SoftDeletes;


class MedicalEntity extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    public function medicalEntities()
    {
        return  $this->hasMany(ClientsWork::class, 'medical_entity_id');
    }
}
