<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'due_date'];
    protected $softDeletes = true;
    protected $dates = ['due_date'];
    protected $primary = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
