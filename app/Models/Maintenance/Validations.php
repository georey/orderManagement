<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;

class Validations extends Model
{
    protected $table = 'validations';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'code', 'description', 'type'];
}
