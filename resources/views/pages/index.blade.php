@extends('layouts.app')

@section('content')
<div class ="jumbotron text-center">
    <h1> Welcome to Collector! </h1>
    <p class="lead text-muted">The info is collected through Android phones and sent to the server.</p>
    <p>
    <a class="btn btn-lg btn-success" href="/location" role="button">Location</a>
    <a class="btn btn-lg btn-success" href="/keyboard" role="button">Keyboard</a>
    <a class="btn btn-lg btn-success" href="/audio" role="button">Audio</a>
    <a class="btn btn-lg btn-success" href="/users" role="button">Users</a>
    </p>
</div>
@endsection

@section('graphs')

<div class="container">
    <div class="row">
      <div class="col-md-4">
          <h2> Number of records </h2>
        <p><div id="chart-div1"></div>  </p>
      </div>
      <div class="col-md-4">
        <h2>Number of users</h2>
        <p><div id="chart-div2"></div>  </p>
      </div>
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec</p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

<?= Lava::render('PieChart', 'DBRecords', 'chart-div1') ?>
<?= Lava::render('BarChart', 'Users', 'chart-div2') ?>
@endsection