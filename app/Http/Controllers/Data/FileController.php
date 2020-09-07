<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Mapper\ClientFormats;
use App\Services\OrderManagementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FileController extends Controller
{
    public function index()
    {
        $data['client_formats'] = ClientFormats::all();
        return view('Data.file')->with($data);
    }

    public function upload(Request $request, OrderManagementService $orderManagementService)
    {
        $client_formats = ClientFormats::findOrFail($request->client_format_id);
        $result = $orderManagementService->processFile($client_formats, $request->file);
        Session::flash('flash_info', $result);
        return redirect()->route('data.file.index');
    }
}
