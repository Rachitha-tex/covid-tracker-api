@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{Session::get('message')}}
    </div>
    @endif
    <div class="d-flex justify-content-start">
        <div class="col-md-6 mx-auto mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('update')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$resp->id}}" name="pcr_id">
                        <div class="form-group">
                            <label for="" class="form-label fw-bold">Date</label>
                            <input type="date" value="{{$resp->date}}" class="form-control" name="date">
                        </div>
                        @error('date')
                            <p class="text-danger font-italic">{{$message}}</p>
                        @enderror
                        <div class="form-group mt-3">
                            <label for="" class="form-label fw-bold">Pcr Count</label>
                            <input type="data" value="{{$resp->pcr_count}}" class="form-control" name="pcr_count" >
                        </div>
                        @error('pcr_count')
                        <p class="text-danger font-italic">{{$message}}</p>
                         @enderror
                        <button class="btn btn-primary mt-3">Update Value</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
