<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Project;

class Project_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['details_description','project_id'];


    public function projects()
    {
        return $this->belongsTo(Project::class);
    }
}
