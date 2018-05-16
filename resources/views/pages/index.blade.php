@extends('layouts.app')

@section('content')
<div class ="jumbotron text-center">
    <h1> Welcome to Collector! </h1>
    <p class="lead text-muted">The info is collected through Android phones and sent to the server.</p>
    <p>
    <a class="btn btn-lg btn-success" href="/location" role="button">Location</a>
    <a class="btn btn-lg btn-success" href="/keyboard" role="button">Keyboard</a>
    <a class="btn btn-lg btn-success" href="/audio" role="button">Audio</a>
    </p>
</div>
@endsection