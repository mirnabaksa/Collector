{!! Form::open(['method'=>'GET','url'=>$url,'class'=>'navbar-form navbar-left','role'=>'search'])  !!}

<div class="input-group custom-search-form">
   <input type="text" class="form-control" name="search" placeholder="Filter by account name...">
   <span class="input-group-btn"> 
       <button class="btn btn-default-sm" type="submit">
           Filter
       </button>
   </span>
</div>
{!! Form::close() !!}