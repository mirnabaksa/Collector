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
<th>Address</th>
@endsection

@section('info') 
@foreach($data as $l)
<tr>
        <th>{{$l->id}} </th>
        <th>{{$l->latitude}} </th>
        <th>{{$l->longitude}} </th>
        <th>{{$l->datetime}} </th>
        <th>{{$l->address}} </th>
</tr> 
@endforeach
@endsection

@section('name')
LocationController
@endsection