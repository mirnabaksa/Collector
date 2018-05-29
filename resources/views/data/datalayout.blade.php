@extends('layouts.app')

@section('content')
    
    <section class="jumbotron text-center">
            <div class="container">
              <h1 class="jumbotron-heading">@yield('title')</h1>
              <p class="lead text-muted">@yield('description')</p>

              @yield('search')
              @if(count($data) == 0)
                <p class = "lead text-muted">No results!</p>
                @endif

              

            </div>
    </section>
          
          <div class ="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            @yield('headers')
                        </tr>
                     </thead>
                     @if(count($data) > 0)
                        @yield('info', $data)
                        <?php echo $data->render(); ?>
                    @endif
                    
            
             </div>
   
 
@endsection