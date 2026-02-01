<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'due_date', 'project_type_id', 'user_id'];
    protected $softDeletes = true;
    protected $dates = ['due_date'];
    protected $primary = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project_types()
    {
        return $this->belongsTo(Project_type::class, 'project_type_id');
    }

    public function project_details()
    {
        return $this->hasMany(Project_detail::class);
    }
}
