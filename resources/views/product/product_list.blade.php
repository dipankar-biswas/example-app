
@extends('layouts.apps')

@section('content')
<div class="body-content mt-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="title">Product Lists</h5>
            <a href="{{ Route('product.create') }}" class="btn btn-sm btn-primary">Add</a>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <h6 class="text-success">{{ Session::get('success') }}</h6>
            @endif
            @if(Session::has('error'))
            <h6 class="text-danger">{{ Session::get('error') }}</h6>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock Qty</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($products) && $products != null)
                    @foreach($products as $data)
                    <tr>
                        <th>{{ $loop->index+1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>${{ $data->price }}</td>
                        <td>{{ $data->stock }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ Route('product.show',$data->id) }}" class="badge text-bg-info text-white">View</a>
                                <a href="{{ Route('product.edit',$data->id) }}" class="badge text-bg-primary">Edit</a>
                                <a href="{{ Route('product.delete',$data->id) }}" class="badge text-bg-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection