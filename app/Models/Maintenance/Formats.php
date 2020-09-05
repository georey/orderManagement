<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formats extends Model
{
    use SoftDeletes;
    protected $table = 'formats';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
