<?php

namespace App\Http\Controllers\Mapper;

use App\Http\Controllers\Controller;
use App\Models\Maintenance\Validations;
use App\Models\Mapper\ClientFormatDetailValidations;
use Illuminate\Http\Request;
use App\Models\Mapper\ClientFormats;
use App\Models\Mapper\ClientFormatDetails;


class MapperController extends Controller
{
    public function index()
    {
        $data['client_formats'] = ClientFormats::withTrashed()->get();
        return view('Mapper.index')->with($data);
    }

    public function create()
    {
        // formulario crear client formato
    }

    public function store()
    {
        // formulario crear client formato
    }

    public function destroy($id)
    {
        // formulario crear client formato
    }

    public function restore($id)
    {
        // formulario crear client formato
    }

    public function detail($id)
    {
        $data['client_format'] = ClientFormats::where('id',$id)->first();
        $data['validations'] = Validations::all();
        $data['client_format_details'] = ClientFormatDetails::where('client_format_id',$id)->get();
        return view('Mapper.detail')->with($data);
    }

    public function storeDetail(Request $request)
    {
        $ClientFormatDetails = new ClientFormatDetails;
        $ClientFormatDetails->field = $request->field;
        $ClientFormatDetails->description = $request->description;
        $ClientFormatDetails->parent_id = $request->parent_id;
        $ClientFormatDetails->client_format_id = $request->client_format_id;

        $ClientFormatDetails->save();

        foreach ($request->validations as $validation){
            $ClientFormatDetailValidations = new ClientFormatDetailValidations;
            $ClientFormatDetailValidations->validation_id = $validation;
            $ClientFormatDetails->clientFormatDetailValidation()->save($ClientFormatDetailValidations);
        }

        return redirect()->route('mapper.detail', ['id'=>$request->client_format_id]);
    }

    public function updateDetail($id)
    {
        // pantalla principal con todos los clientes y formatos
    }

    public function destroyDetail($id)
    {
        // pantalla principal con todos los clientes y formatos
    }
}
