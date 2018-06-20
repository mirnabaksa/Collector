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
        <th>
                {!!Form::open(['action' => ['UserController@destroy', $l->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
            {{ Form::close() }}
        </th>
</tr> 
@endforeach
@endsection

@section('name')
UserController
@endsection

@section('search')
@include('data.search',['url'=>'collector/users','link'=>'collector/users'])
@endsection