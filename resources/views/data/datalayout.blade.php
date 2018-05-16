@extends('layouts.app')

@section('content')
    @if(count($data) > 0)
    <section class="jumbotron text-center">
            <div class="container">
              <h1 class="jumbotron-heading">@yield('title')</h1>
              <p class="lead text-muted">@yield('description')</p>
            </div>
    </section>
          
          <div class ="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            @yield('headers')
                        </tr>
                     </thead>
                     
                     @yield('info', $data)
             </div>
    @else
    <section class="jumbotron text-center">
            <div class="container">
              <h1 class="jumbotron-heading">No info collected yet!</h1>
            </div>
    </section>
    @endif
@endsection