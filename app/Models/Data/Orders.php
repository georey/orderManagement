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
}
