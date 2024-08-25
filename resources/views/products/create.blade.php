@extends('layouts.app')

@section('css')
    <!-- Tambahkan CSS khusus di sini jika diperlukan -->
@endsection

@section('contentheader')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add New Product</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" id="category" name="category" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>
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
