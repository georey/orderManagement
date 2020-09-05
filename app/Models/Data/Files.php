<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = ['client_format_id', 'name'];

    public function clientFormat()
    {
        return $this->belongsTo('App\Models\Mapper\ClientFormats', 'client_format_id');
    }
}
