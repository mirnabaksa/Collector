@extends('data.datalayout')

@section('title')
Users
@endsection

@section('description')
Users of the application
@endsection

@section('headers')
<th>#</th>
<th>Account</th>
@endsection

@section('info') 
@foreach($data as $l)
<tr>
        <th>{{$l->id}} </th>
        <th>{{$l->account}} </th>
</tr> 
@endforeach
@endsection

@section('name')
UserController
@endsection

@section('search')
@include('data.search',['url'=>'location','link'=>'location'])
@endsection