<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'due_date'];
    protected $softDeletes = true;
    protected $dates = ['due_date'];
    protected $primary = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project_types()
    {
        return $this->belongsTo(Project_type::class);
    }
}
