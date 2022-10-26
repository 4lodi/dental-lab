<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ClientsWork;

class WorksPrice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function typeWork()
    {
        return  $this->hasMany(ClientsWork::class, 'type_work_id');
    }

    public function works()
    {
        return  $this->belongsTo(Work::class, 'work_id', 'id');
    }
}
