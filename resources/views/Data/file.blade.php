@extends('layout.master')
@section('title')
    Upload
@endsection
@section('content')
    <form enctype="multipart/form-data" class="form-inline" action="{{route('data.file.upload')}}" method="post">
        @csrf
        <div class="col-lg-4 form-inline">
            <label class="col-form-label" for="client_format_id">Client - Format: </label>
            <select id="client_format_id" name="client_format_id" class="form-control select2" required>
                <option value="">Select an option</option>
                @foreach($client_formats as $client_format)
                    <option value="{{$client_format->id}}">{{$client_format->client->name}}
                        - {{$client_format->format->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 form-inline">
            <input type="file" id="file" name="file" class="form-control" required>
        </div>
        <div class="col-lg-4 form-inline">
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
    </form>
    @if(Session::has('flash_info'))
        <div class="alert
            @if(Session::get('flash_info')['success'])
            alert-success
            @else
            alert-danger
            @endif" role="alert">
            {{Session::get('flash_info')['message']}}<br>
            @if(Session::has('flash_info')['errors'])
                @foreach(Session::get('flash_info')['errors'] as $error)
                {{ implode('', $error) }}<br>
                @endforeach
            @endif
        </div>
    @endif
@endsection
