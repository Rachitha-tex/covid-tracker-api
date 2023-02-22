@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-row justify-content-between">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Local Total Cases</h5>
 

                <h6 class="card-subtitle mb-2 text-muted">{{$newdata['local_total_cases']}}</h6>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Local Deaths</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$newdata['local_deaths']}}</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Local Active Cases</h5>
                <h6 class="card-subtitle mb-2 text-muted"> {{$newdata['local_active_cases']}}</h6>
            </div>
        </div>
        
    </div>

    @if (Session::has('message'))
        <p class="alert alert-success">
            {{Session::get('message')}}
        </p>
    @endif
    <div class="row justify-content-center">
     
        <div class="col-md-8 mt-4">
         <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>New Cases</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($response as $item)
                    <tr>
                        <td>{{$item['date']}}</td>
                        <td>{{$item['pcr_count']}}</td>
                        <td>
                            <a href="{{route('edit',$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('delete',$item->id)}}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
         </table>
         <div class="d-flex justify-content-center">
            {!! $response->links('pagination::bootstrap-5') !!}
        </div>
        </div>
    </div>
</div>
@endsection
