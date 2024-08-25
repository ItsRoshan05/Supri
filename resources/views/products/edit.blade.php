@extends('layouts.app')

@section('css')
    <!-- Tambahkan CSS khusus di sini jika diperlukan -->
@endsection

@section('contentheader')
    <h1>Edit Product</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Product</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" id="category" name="category" class="form-control" value="{{ $product->category }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01" value="{{ $product->price }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>
                        <a href="{{ route('products.index') }}" class="btn btn-default">Back to Products List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Tambahkan JavaScript khusus di sini jika diperlukan -->
@endsection
