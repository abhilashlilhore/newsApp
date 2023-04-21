<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsModel extends Model
{
     use HasFactory;
    protected $table='newsdata';
    public $timestamps = false;
}
