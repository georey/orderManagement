@foreach($details as $detail)
    @if($detail->parent_id == $parent_id)
        <li>{{$detail->field}}
            @if(count($detail->details)>0)
            <ul>
                @include('Mapper.tree',array('details' => $details, 'parent_id'=>$detail->id))
            </ul>
            @endif
        </li>
    @endif
@endforeach
