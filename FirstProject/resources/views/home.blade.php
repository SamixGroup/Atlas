@extends('layouts.app')

@section('content')


    <div class="form">
        <form action="{{route('addOrder')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="subject" name="subject" class="form-control">
            <input type="text" placeholder="sms" name="sms" class="form-control">
            <input type="file" name="file">
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
