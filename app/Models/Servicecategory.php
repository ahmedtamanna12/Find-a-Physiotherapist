<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicecategory extends Model
{
    use HasFactory;
    protected $table = 'servicecategorys';
    protected $fillable = ['service_name','service_description','status'];
}
