<?php

namespace App\Models\Mapper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientFormatDetails extends Model
{
    use SoftDeletes;
    protected $table = 'client_format_details';
    protected $primaryKey = 'id';
    protected $fillable = ['client_format_id', 'parent_id', 'field', 'description'];

    public function clientFormat()
    {
        return $this->belongsTo('App\Models\Mapper\ClientFormats', 'client_format_id');
    }

    public function clientFormatDetailValidation()
    {
        return $this->hasMany('App\Models\Mapper\ClientFormatDetailValidations');
    }

    public function getChildren($id)
    {
        return ClientFormatDetails::where("parent_id", $id)->get()->toArray();
    }
}
