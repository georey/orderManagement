<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class OrderStatusLogs extends Model
{
    protected $table = 'order_status_logs';
    protected $primaryKey = 'id';
    protected $fillable = ['order_status_id', 'order_id'];

    public function orderStatus()
    {
        return $this->belongsTo('App\Models\Maintenance\OrderStatuses', 'order_status_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Data\Orders', 'order_id');
    }
}
