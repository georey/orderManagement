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
            <tr>
                <td>1</td>
                <td>NFL</td>
                <td>XLS</td>
                <td>
                    <a href="{{route('mapper.detail', ['id' => 1])}}" title="Details" class="btn-sm"><i class="fas fa-list"></i></a> |
                    <a href="{{route('mapper.destroy', ['id' => 1])}}" title="Delete" class="btn-sm"><i class="fas fa-trash-alt"></i></a> |
                    <a href="{{route('mapper.restore', ['id' => 1])}}" title="Destroy" class="btn-sm"><i class="fas fa-redo-alt"></i></a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>NFL</td>
                <td>JSON</td>
                <td>
                    <a href="{{route('mapper.detail', ['id' => 2])}}" title="Details" class="btn-sm"><i class="fas fa-list"></i></a> |
                    <a href="{{route('mapper.destroy', ['id' => 2])}}" title="Delete" class="btn-sm"><i class="fas fa-trash-alt"></i></a> |
                    <a href="{{route('mapper.restore', ['id' => 2])}}" title="Destroy" class="btn-sm"><i class="fas fa-redo-alt"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
