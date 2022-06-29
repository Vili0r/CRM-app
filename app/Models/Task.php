<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'project_id',
        'tenant_id',
        'deadline_at',
        'completed',
        'position',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
