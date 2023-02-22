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
                    <form action="{{route('store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="" class="form-label fw-bold">Link</label>
                            <input type="text" class="form-control" name="link" placeholder="Enter Link">
                        </div>
                        @error('link')
                            <p class="text-danger font-italic">{{$message}}</p>
                        @enderror
                        <div class="form-group mt-3">
                            <label for="" class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" placeholder="Enter description"></textarea>
                        </div>
                        @error('description')
                        <p class="text-danger font-italic">{{$message}}</p>
                         @enderror
                        <button class="btn btn-primary mt-3">Create Guide</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
