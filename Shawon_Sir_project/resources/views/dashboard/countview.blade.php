
@extends('layouts.main')


@section('content')


<div class="container col-8 offset-2 mt-5">
   
    <button type="button" class="btn btn-primary mb-3">
             Total Trainee <span class="badge badge-light">{{$query_count}}</span>
    </button>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">

        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
        </tr>
    </thead>
    <tbody>
        @foreach($query as $q)
        <tr>
            <td>{{$q->name}}</td>
            <td>{{$q->email}}</td>
            <td>{{$q->mobile}}</td>
        </tr>
        @endforeach
    </tbody>

    </table>
        </div>
    </div>
</div>

@endsection



