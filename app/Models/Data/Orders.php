<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['file_id', 'order_number', 'data', 'order_status_id'];

    public function file()
    {
        return $this->belongsTo('App\Models\Data\Files', 'file_id');
    }

    public function orderStatus()
    {
        return $this->belongsTo('App\Models\Maintenance\OrderStatuses', 'order_status_id');
    }

    public function orderStatusLog()
    {
        return $this->hasMany('App\Models\Data\OrderStatusLogs', 'order_id');
    }

    public static function getOrders($client_id)
    {
        $orders = Orders::select('data')
            ->join('files', 'files.id', '=', 'orders.file_id')
            ->join('client_formats', 'files.client_format_id', '=', 'client_formats.id')
            ->where('client_formats.client_id', $client_id)
            ->where('orders.order_status_id', 2)
            ->get();
        return $orders->implode('data',',');
    }
}
