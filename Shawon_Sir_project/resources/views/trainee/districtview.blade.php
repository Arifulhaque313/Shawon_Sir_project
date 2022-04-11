@extends('layouts.main')

@section('content')

<!-- cards -->
<div class="container mt-5">

    <div class="row row-cols-2 row-cols-md-4 g-4">
 
@foreach($district as $d)
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


  @endsection