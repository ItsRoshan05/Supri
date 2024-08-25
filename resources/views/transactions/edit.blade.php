@extends('layouts.app')

@section('css')
    <!-- Tambahkan CSS khusus di sini jika diperlukan -->
@endsection

@section('contentheader')
    <h1>Edit Transaction</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit Transaction</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="transaction_date">Transaction Date:</label>
                            <input type="date" id="transaction_date" name="transaction_date" class="form-control" value="{{ $transaction->transaction_date->format('Y-m-d') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="total">Total:</label>
                            <input type="number" id="total" name="total" class="form-control" step="0.01" value="{{ $transaction->total }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Transaction</button>
                        <a href="{{ route('transactions.index') }}" class="btn btn-default">Back to Transactions List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Tambahkan JavaScript khusus di sini jika diperlukan -->
@endsection
