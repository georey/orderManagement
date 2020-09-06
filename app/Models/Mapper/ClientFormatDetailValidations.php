<?php

namespace App\Models\Mapper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientFormatDetailValidations extends Model
{
    use SoftDeletes;
    protected $table = 'client_format_detail_validations';
    protected $primaryKey = 'id';
    protected $fillable = ['client_format_detail_id', 'validation_id', 'validation'];

    public function clientFormatDetail()
    {
        return $this->belongsTo('App\Models\Mapper\ClientFormatDetails', 'client_format_detail_id');
    }

    public function clientFormatDetailValidation()
    {
        return $this->belongsTo('App\Models\Maintenance\Validations', 'validation_id');
    }
}
