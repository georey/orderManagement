<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;

class OrderStatuses extends Model
{
    protected $table = 'order_statuses';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
