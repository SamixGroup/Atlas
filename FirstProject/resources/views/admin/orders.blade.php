@extends('layouts.app')

@section('content')

    <div class="container">
    @foreach($orders as $order)
        <div class="order">
            <div class="order_id">
                {{$order->id}} || {{$order->client_name}} || <a href="{{route('orderVerify', ['id' => $order->id])}}"><span class="badge badge-success">{{$photo->status}}</span></a>

            </div>
        </div>
        @endforeach
    </div>
@endsection
