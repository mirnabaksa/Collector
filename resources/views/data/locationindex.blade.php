@extends('data.datalayout')

@section('title')
Collected location info
@endsection

@section('description')
Location info collected from Android phone sensors.
@endsection

@section('headers')
<th>#</th>
<th>Latitude</th>
<th>Longitude</th>
<th>Date</th>
<th>Account</th>
<th>Address</th>
@endsection

@section('info') 
@foreach($data as $l)
<tr>
        <th>{{$l->id}} </th>
        <th>{{$l->latitude}} </th>
        <th>{{$l->longitude}} </th>
        <th>{{$l->datetime}} </th>
        <th>{{$l->collectoruser->account}} </th>
        <th>{{$l->address}} </th> 
        <th>
                {{ Form::open(array('url' => '/location/destroy/' . $l->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </th>
</tr> 
@endforeach
@endsection

@section('name')
LocationController
@endsection

@section('search')
@include('data.search',['url'=>'location','link'=>'location'])
@endsection