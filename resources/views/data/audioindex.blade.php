@extends('data.datalayout')

@section('title')
Collected audio info
@endsection

@section('description')
Audio collected from phone microphone.
@endsection

@section('headers')
<th>#</th>
<th>Path</th>
<th>Date</th>
<th>Account</th>
@endsection

@section('info') 
@foreach($data as $l)
<tr>
        <th>{{$l->id}} </th>
        <th>{{$l->path}} </th>
        <th>{{$l->date}} </th>
        <th>{{$l->collectoruser->account}} </th>
        <th>
        {!!Form::open(['action' => ['AudioController@destroy', $l->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-warning'])}}
        {!!Form::close()!!}
        </th>

        <th>
                <a href="{{ route('download', ['filename' => $l->path]) }}">Download</a>
        </th>
</tr> 
@endforeach
@endsection

@section('name')
AudioController
@endsection

@section('search')
@include('data.search',['url'=>'collector/audio','link'=>'collector/audio'])
@endsection