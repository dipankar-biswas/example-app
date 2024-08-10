
@extends('layouts.apps')

@section('content')
<div class="body-content mt-4">
    @if(Session::has('success'))
    <h6 class="text-success">{{ Session::get('success') }}</h6>
    @endif
    @if(Session::has('error'))
    <h6 class="text-danger">{{ Session::get('error') }}</h6>
    @endif
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
        @if(isset($products) && $products != null)
        @foreach($products as $data)
        <div class="col">
            <div class="card">
                <img src="https://usa-oss.edifier.com/Uploads/images/2023/05/15/2023051517241716841426574397.png" class="card-img-top" alt="Product">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->name }}</h5>
                    <h6>${{ $data->price }}</h6>
                    <h6>Stock: {{ $data->stock }}</h6>
                    <p class="card-text">{{ $data->description }}</p>
                    <a href="{{ Route('product.addtocart',$data->id) }}" class="btn btn-sm btn-primary">Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection