<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'deadline_at',
        'tenant_id',
        'status',
    ];

    protected $casts = [
        'deadline_at' => 'datetime',
        'status' => Status::class,
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
