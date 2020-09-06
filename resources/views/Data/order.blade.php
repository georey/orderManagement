@extends('layout.master')
@section('title')
    Order
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Client</th>
                <th>Type</th>
                <th>File</th>
                <th>Order Number</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->file->clientFormat->client->name}}</td>
                    <td>{{$order->file->clientFormat->format->name}}</td>
                    <td>{{$order->file->name}}</td>
                    <td>{{$order->order_number}}</td>
                    <td>
                        <a href="#" data-id="{{$order->id}}" data-json="{{$order->data}}" title="Details" data-toggle="modal" data-target="#orderModal"
                           class="btn-sm order_detail"><i class="fas fa-file-alt"></i></a> |
                        <a href="{{route('data.orders.set', ['id' => $order->id, 'order_status_id' => 2])}}" title="Accept Order"
                           class="btn-sm"><i class="fas fa-check"></i></a> |
                        <a href="{{route('data.orders.set', ['id' => $order->id, 'order_status_id' => 3])}}" title="Reject Order"
                           class="btn-sm"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @include('Data.order_modal')
@endsection
@section('script')
    <script src="{{asset('js/data/order.js')}}"></script>
@endsection
