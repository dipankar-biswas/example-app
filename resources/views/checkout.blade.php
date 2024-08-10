
@extends('layouts.apps')

@section('content')
<div class="body-content mt-4">
    <form action="{{ Route('checkout.order') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-5 shadow p-3">
                <h4 class="border-bottom mb-3 pb-2">Delivery Info</h4>
                <div class="mb-2">
                    <label for="exampleName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control form-control-sm" id="exampleName">
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="examplePhone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control form-control-sm" id="examplePhone">
                    @error('phone')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control form-control-sm" id="exampleInputEmail1">
                    @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="exampleAddress" class="form-label">Email address</label>
                    <textarea class="form-control form-control-sm" name="address" id="exampleAddress" rows="4"></textarea>
                    @error('address')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card shadow">
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
                                    <th scope="col">Qty</th>
                                    <th scope="col">Subtotal</th>
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
                                    <td>{{ $data->quantity }}</td>
                                    <td>${{ $data->price * $data->quantity }}</td>
                                    <td>
                                        <div class="actions">
                                            <a href="{{ Route('cart.delete',$data->id) }}" class="badge text-bg-danger">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-end">Total: </th>
                                    <th colspan="2">${{$products->sum(function($product){ return $product->price * $product->quantity; })}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="card-foot p-4 pt-0">
                        <button type="submit" class="btn btn-sm btn-primary">Order Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection