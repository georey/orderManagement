<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Data\Orders;
use App\Models\Data\OrderStatusLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Orders::where('order_status_id', 1)->get();
        return view('Data.order')->with($data);
    }

    public function getOrder($client_id)
    {
        return Orders::getOrders($client_id);
        // pantalla principal con todos los clientes y formatos
    }

    public function setOrder($id, $order_status_id)
    {
        #Actualizar Estado de la orden
        $order = Orders::findOrFail($id);
        $order->order_status_id = $order_status_id;
        $order->save();
        #Agregar log
        $log = new OrderStatusLogs;
        $log->order_status_id = $order_status_id;
        $order->orderStatusLog()->save($log);
        #Enviar Notificacion
        /*if(count($order->orderStatus->orderStatusNotification)>0){
            $data_mail['order'] = $order;
            $this->sendEmail($data_mail);
        }*/

        return redirect()->route('data.orders.index');
    }

    protected function sendEmail($data_mail){
        Mail::send('emails.order_notifications', $data_mail, function ($m) use ($data_mail) {
            foreach ($data_mail['order']->orderStatus->orderStatusNotification as $notification){
                $m->to($notification->email);
            }
            $m->subject($data_mail['order']->orderStatus->name);
        });
    }
}
