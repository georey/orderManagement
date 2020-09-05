<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatusNotifications extends Model
{
    use SoftDeletes;
    protected $table = 'order_status_notifications';
    protected $primaryKey = 'id';
    protected $fillable = ['order_status_id', 'email'];

    public function orderStatus()
    {
        return $this->belongsTo('App\Models\Maintenance\OrderStatuses', 'order_status_id');
    }
}
