<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutputFields extends Model
{
    use SoftDeletes;
    protected $table = 'output_fields';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'field'];
}
