<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Project;

class Project_type extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['types_name', 'keterangan'];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
