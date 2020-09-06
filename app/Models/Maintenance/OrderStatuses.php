<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;

class OrderStatuses extends Model
{
    protected $table = 'order_statuses';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function orderStatusNotification()
    {
        return $this->hasMany('App\Models\Maintenance\OrderStatusNotifications', 'order_status_id');
    }
}
