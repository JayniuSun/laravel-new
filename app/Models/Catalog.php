<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = ['name', 'description'];
    protected $softDeletes = true;
    protected $primary = 'id';

}

