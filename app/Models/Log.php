<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['message', 'timestamp'];
    protected $softDeletes = true;
    protected $primary = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
