@foreach($details as $detail)
    @if($detail->parent_id == $parent_id)
        <li><h6>{{$detail->description}} ({{$detail->field}}) => {{$detail->outputField->name}}
                ({{$detail->outputField->field}})</h6>
            @if(count($detail->clientFormatDetailValidation)>0)
                <label class="font-italic">|
                    @foreach($detail->clientFormatDetailValidation as $validation)
                        {{$validation->clientFormatDetailValidation->name}} |
                    @endforeach
                </label>
            @endif

            @if(count($detail->details)>0)
                <ul>
                    @include('Mapper.tree',array('details' => $details, 'parent_id'=>$detail->id))
                </ul>
            @endif
        </li>
    @endif
@endforeach
