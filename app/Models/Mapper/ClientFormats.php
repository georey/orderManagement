<?php

namespace App\Models\Mapper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientFormats extends Model
{
    use SoftDeletes;
    protected $table = 'client_formats';
    protected $primaryKey = 'id';
    protected $fillable = ['client_id', 'format_id'];

    public function client()
    {
        return $this->belongsTo('App\Models\Maintenance\Clients', 'client_id');
    }

    public function format()
    {
        return $this->belongsTo('App\Models\Maintenance\Formats', 'format_id');
    }
}
