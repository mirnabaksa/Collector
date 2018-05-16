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
@endsection

@section('info') 
@foreach($data as $l)
<tr>
        <th>{{$l->id}} </th>
        <th>{{$l->path}} </th>
        <th>{{$l->date}} </th>
</tr> 
@endforeach
@endsection

@section('name')
AudioController
@endsection