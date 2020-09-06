@extends('layout.master')
@section('title')
    Mapper detail
@endsection
@section('content')
    <h2>{{$client_format->client->name}} - {{$client_format->format->name}}</h2>
    <form class="form-inline" action="{{route('mapper.storeDetail')}}" method="post">
        @csrf
        <input type="hidden" id="client_format_id" name="client_format_id" value="{{$client_format->id}}">

        <label class="col-form-label" for="field">Field: </label>
        <input type="text" id="field" name="field" class="form-control" required>

        <label class="col-form-label" for="description">Description: </label>
        <input type="text" id="description" name="description" class="form-control">

        <label class="col-form-label" for="parent_id">Parent: </label>
        <select id="parent_id" name="parent_id" class="form-control">
            @foreach($client_format_details as $client_format_detail)
                <option value="{{$client_format_detail->id}}">{{$client_format_detail->field}}</option>
            @endforeach
        </select>

        <label class="col-form-label" for="validations">Validations: </label>
        <select multiple id="validations" name="validations[]" class="form-control">
            @foreach($validations as $validation)
                <option value="{{$validation->id}}">{{$validation->name}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <div class="row">
        <ul>
            @include('Mapper.tree',array('details' => $client_format_details, 'parent_id'=>null))
        </ul>

    </div>
@endsection
