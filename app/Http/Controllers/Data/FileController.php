<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Mapper\ClientFormats;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $data['client_formats'] = ClientFormats::all();
        return view('Data.file')->with($data);
    }

    public function upload()
    {
        return true;
    }
}
