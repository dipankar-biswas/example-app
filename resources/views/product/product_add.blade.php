@extends('layouts.apps')

@section('content')
<div class="body-content mt-4">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Product Add</h5>
        </div>
        <div class="card-body">
            <form action="{{ Route('product.add') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="exampleName" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control form-control-sm" id="exampleName">
                    @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <label for="examplePrice" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control form-control-sm" id="examplePrice">
                            @error('price')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <label for="exampleStock" class="form-label">Stock Quantity</label>
                            <input type="text" name="stock" class="form-control form-control-sm" id="exampleStock">
                            @error('stock')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="exampleDescription" class="form-label">Description</label>
                    <textarea name="description" class="form-control form-control-sm" id="exampleDescription" rows="6"></textarea>
                    @error('description')
                    <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleImage" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control form-control-sm" id="exampleImage">
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection