@extends('layouts.app')

@section('css')
    <!-- Tambahkan CSS khusus di sini jika diperlukan -->
@endsection

@section('contentheader')
    <h1>Add Transaction</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add New Transaction</h3>
                </div>
                <div class="box-body">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="transaction_date">Transaction Date:</label>
                            <input type="date" id="transaction_date" name="transaction_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="total">Total:</label>
                            <input type="number" id="total" name="total" class="form-control" step="0.01" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Transaction</button>
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
