@extends('layout.master')
@section('title')
    Mapper
@endsection
@section('content')
    <div class="row">
        <a href="{{route('mapper.create')}}" class="float-right btn btn-primary">Create Map</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Client</th>
                <th>Format</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($client_formats as $client_format)
                <tr>
                    <td>{{$client_format->id}}</td>
                    <td>{{$client_format->client->name}}</td>
                    <td>{{$client_format->format->name}}</td>
                    <td>
                        <a href="{{route('mapper.detail', ['id' => $client_format->id])}}" title="Details"
                           class="btn-sm"><i class="fas fa-list"></i></a> |
                        @if(isset($client_format->deleted_at))
                            <a href="{{route('mapper.restore', ['id' => $client_format->id])}}" title="Destroy"
                               class="btn-sm"><i class="fas fa-redo-alt"></i></a>
                        @else
                            <a href="{{route('mapper.destroy', ['id' => $client_format->id])}}" title="Delete"
                               class="btn-sm"><i class="fas fa-trash-alt"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
