@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('create')}}" class="btn btn-primary float-end">Create New Guide</a>
    <div class="d-flex justify-content-start">
        <div class="col-md-6 mx-auto mt-5 ">
            @foreach ($guide as $item)
            <div class="card mt-3">
                <div class="card-header">
                    <div class=" d-flex justify-content-between">
                        <h5 class="text-primary mr-5">{{$item->user_name}}</h5> 
                        <a href="{{$item->link}}" class="card-link">Go to Link</a>
                    </div>
                  </div>
                <div class="card-body">
                    <div class="card-title">
                     <p class="fw-bold"> {{$item->description}}</p>  
                    </div>
                </div>
                <div class="card-footer">
                    {{$item->date_created}}
                </div>
            </div>
            @endforeach
          
        </div>
    </div>
</div>
@endsection
