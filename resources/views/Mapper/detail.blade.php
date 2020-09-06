@extends('layout.master')
@section('title')
    Mapper detail
@endsection
@section('content')
    <h2>{{$client_format->client->name}} - {{$client_format->format->name}}</h2>
    <form class="form-inline" action="{{route('mapper.storeDetail')}}" method="post">
        @csrf
        <input type="hidden" id="client_format_id" name="client_format_id" value="{{$client_format->id}}">

        <div class="col-lg-4 form-inline">
            <label class="col-form-label" for="field">Field: </label>
            <input type="text" id="field" name="field" class="form-control" required>
        </div>
        <div class="col-lg-4 form-inline">
            <label class="col-form-label" for="description">Description: </label>
            <input type="text" id="description" name="description" class="form-control">
        </div>
        <div class="col-lg-4 form-inline">
            <label class="col-form-label" for="output_field_id">Output Field: </label>
            <select id="output_field_id" name="output_field_id" class="form-control select2" required>
                <option value="">Select an option</option>
                @foreach($output_fields as $output_field)
                    <option value="{{$output_field->id}}">{{$output_field->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 form-inline">
            <label class="col-form-label" for="parent_id">Parent: </label>
            <select id="parent_id" name="parent_id" class="form-control select2">
                <option value="">Select an option</option>
                @foreach($client_format_details as $client_format_detail)
                    <option value="{{$client_format_detail->id}}">{{$client_format_detail->field}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 form-inline">
            <label class="col-form-label" for="validations">Validations: </label>
            <select multiple id="validations" name="validations[]" class="form-control select2">
                @foreach($validations as $validation)
                    <option value="{{$validation->id}}">{{$validation->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 form-inline">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form><br><br>
    <div class="row jumbotron">
        <h3>Structure</h3>
        <ul>
            @include('Mapper.tree',array('details' => $client_format_details, 'parent_id'=>null))
        </ul>

    </div>
@endsection
