@extends('layouts.app')

@section('css')
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('contentheader')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Transactions List</h3>
                <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add New
                    Transaction</a>
            </div>
            <div class="box-body">
                <table id="transactionsTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Transaction Date</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->formatted_date }}</td>
                                <td>Rp {{ $transaction->formatted_total }}</td>
                                <td>
                                    <a href="{{ route('transactions.edit', $transaction->id) }}"
                                        class="btn btn-warning btn-xs">Edit</a>
                                    <form
                                        action="{{ route('transactions.destroy', $transaction->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#transactionsTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });

</script>
@endsection
