<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clients extends Model
{
    use SoftDeletes;
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];
}
