
@extends('layouts.apps')

@section('content')
<div class="body-content mt-4">
    <div class="content text-center">
        @if (Session::has('success'))
        <h3 class="form-text text-success text-center">{!! Session::get('success') !!}</h3>
        @endif
        @if (Session::has('error'))
        <h3 class="form-text text-danger text-center">{{ Session::get('error') }}</h3>
        @endif

        @if(Session::get('success'))
            @php 
            $orderInfo = Session::get('orderInfo')
            @endphp
            <h5>Name: {{$orderInfo->name}}</h5>
            <h5>Phone: {{$orderInfo->phone}}</h5>
            <h5>Email: {{$orderInfo->email}}</h5>
            <h5>Address: {{$orderInfo->address}}</h5>
            <br>
            @php 
                $products = Session::get('products')
            @endphp
            <h5>Quantity: {{$products->sum('quantity')}}</h5>
            <h5>Total: ${{$products->sum(function($product){ return $product->price * $product->quantity; })}}</h5>
        @endif

        <a href="{{ route('home') }}" class="btn btn-sm btn-success">Goto Home</a>
    </div>
</div>
@endsection