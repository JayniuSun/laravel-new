<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['id','name', 'email', 'phone', 'company', 'message'];
    protected $softDeletes = true;
    protected $primary = 'id';
}
