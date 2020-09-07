<?php

namespace App\Services;

use App\Models\Data\Files;
use App\Models\Data\Orders;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OrderManagementService
{

    public function processFile($client_format, $file)
    {
        switch ($client_format->format_id) {
            case 1:
                $result = $this->processCSV($client_format, $file);
                break;
            case 2:
                $result = $this->processJSON($file);
                break;
            case 3:
                $result = $this->processXML($file);
                break;
            case 4:
                $result = $this->processEDI($file);
                break;
            default:
                $result = ['success' => false, 'message' => 'Unsupported Extension'];
                break;
        }

        if (!$result['success'])
            return $result;

        $fileModel = $this->uploadFile($client_format, $file);
        $this->saveOrders($fileModel, $result['orders']);
        $result = ['success' => true, 'message' => 'File Upload correctly!!'];
    }

    private function uploadFile($client_format, $file)
    {
        $basename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension());
        $fileName = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $basename)) . '.' . $file->getClientOriginalExtension();
        $path = "uploads/{$client_format->client->name}/";
        $full_path = base_path() . '/public/' . $path;
        if (!File::exists($full_path)) {
            $file->move($full_path, $fileName);
        } else {
            $file->move($full_path, $fileName);
        }
        $fileModel = new Files();
        $fileModel->client_format_id = $client_format->id;
        $fileModel->name = $fileName;
        $fileModel->url = $path . $fileName;
        $fileModel->save();
        return $fileModel;
    }

    private function processCSV($client_format, $file)
    {
        $csv = array_map("str_getcsv", file($file, FILE_SKIP_EMPTY_LINES));
        $keys = array_shift($csv);

        #Verify that all keys Exist
        $verifyKeys = true;
        $missingKeys = [];
        $validations = [];
        foreach ($client_format->clientFormatDetails as $clientFormatDetail) {
            if (!in_array($clientFormatDetail->field, $keys)) {
                $verifyKeys = false;
                $missingKeys[] = $clientFormatDetail->field;
            }
            $tmp_validations = [];
            foreach ($clientFormatDetail->clientFormatDetailValidation as $item) {
                $tmp_validations[] = $item->clientFormatDetailValidation->code;
            }
            $validations[$clientFormatDetail->field] = implode("|", $tmp_validations);
        }

        if (!$verifyKeys) {
            return ['success' => false, 'message' => 'Missing Keys: ' . implode(", ", $missingKeys)];
        }

        #build data
        foreach ($csv as $i => $row) {
            $csv[$i] = array_combine($keys, $row);
        }

        #Verify all Validation
        $errors = [];
        foreach ($csv as $key => $row) {
            $line = $key + 1;
            foreach ($row as $column => $value) {
                $result = $this->validate($column, $value, $validations[$column]);
                if (!$result['success'])
                    $errors[] = ['message' => "Error in line {$line}, column {$column}", 'errors' => $result['message']];
            }
        }

        if (count($errors) > 0)
            return ['success' => false, 'message' => 'Validation incomplete', 'errors' => $errors];

        return ['success' => true, 'orders' => $csv];
    }

    private function processJSON($file)
    {
        return ['success' => false, 'message' => 'Unsupported Extension'];
    }

    private function processXML($file)
    {
        return ['success' => false, 'message' => 'Unsupported Extension'];
    }

    private function processEDI($file)
    {
        return ['success' => false, 'message' => 'Unsupported Extension'];
    }

    private function validate($column, $value, $validations)
    {
        $validator = Validator::make([$column => $value], [$column => $validations]);
        if ($validator->fails()) {
            return ['success' => false, 'message' => $validator->errors()];
        }
        return ['success' => true];
    }

    private function saveOrders($file, $orders)
    {
        foreach ($orders as $order){
            $orderModel = new Orders;
            $orderModel->order_number = $order['order_number'];
            $orderModel->data =json_encode($order);
            $orderModel->order_status_id = 1;
            $file->fileOrder()->save($orderModel);
        }
    }
}
