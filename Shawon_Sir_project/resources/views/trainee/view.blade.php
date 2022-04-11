@extends('layouts.main')

@section('content')

<!-- cards -->
<div class="container mt-5">

    <div class="row row-cols-2 row-cols-md-4 g-4">
 
@foreach($division as $d)
  <div class="col">
    <div class="card " style="height:150px">
      
      <div class="card-body">
        <h5 class="card-title">{{$d->sitename_bn}}</h5>
        <p class="card-text text-end">Total: </p>
        <a href="" class="btn btn-primary">view all </a>
      </div>
    </div>
  </div>
  @endforeach
 
  
</div>

</div>





<br> <br> <br>

<div class="container col-12 offset-1">
    <table class="table border"> 
    <thead>
        <tr>
            <td>serial</td>
            <td>name</td>
            <td>email</td>
            <td>sitename_bn</td>
        </tr>
    </thead>

    <tbody>
        @foreach($trainee as $t)
        <tr>
            <td>{{$t->name}}</td>
            <td>{{$t->designation}}</td>
            <td>{{$t->parent_id}}</td>
            <td>{{$t->sitename_bn}}</td>

        </tr>
        @endforeach
    </tbody>



</table>
</div>









@endsection