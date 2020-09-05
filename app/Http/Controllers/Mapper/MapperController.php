<?php

namespace App\Http\Controllers\Mapper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapper\ClientFormats;
use App\Models\Mapper\ClientFormatDetails;


class MapperController extends Controller
{
    public function index()
    {
        return view('Mapper.index');
    }

    public function create()
    {
        // formulario crear client formato
    }

    public function store()
    {
        // formulario crear client formato
    }

    public function destroy()
    {
        // formulario crear client formato
    }

    public function restore()
    {
        // formulario crear client formato
    }

    public function detail()
    {
        // formulario campo y validacion
    }

    public function storeDetail()
    {
        // pantalla principal con todos los clientes y formatos
    }

    public function updateDetail()
    {
        // pantalla principal con todos los clientes y formatos
    }

    public function destroyDetail()
    {
        // pantalla principal con todos los clientes y formatos
    }
}
