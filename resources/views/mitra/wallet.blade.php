@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Wallet</h1>

    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif

    <div class="card mb-4">
        <div class="card-body">
            <h3>Balance: <strong>Rp {{ number_format($wallet->balance, 2) }}</strong></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Request Topup</div>
                <div class="card-body">
                    <form method="post" action="{{ route('mitra.wallet.topup') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Amount</label>
                            <input type="number" step="0.01" name="amount" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Proof (optional)</label>
                            <input type="file" name="proof" class="form-control">
                        </div>
                        <button class="btn btn-primary">Submit Topup Request</button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Topup Requests</div>
                <div class="card-body">
                    <table class="table">
                        <thead><tr><th>Amount</th><th>Status</th><th>Created</th></tr></thead>
                        <tbody>
                            @foreach($topups as $t)
                                <tr>
                                    <td>Rp {{ number_format($t->amount, 2) }}</td>
                                    <td>{{ $t->status }}</td>
                                    <td>{{ $t->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $topups->links() }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Transactions</div>
                <div class="card-body">
                    <table class="table">
                        <thead><tr><th>Type</th><th>Amount</th><th>Description</th><th>Date</th></tr></thead>
                        <tbody>
                            @foreach($transactions as $tx)
                                <tr>
                                    <td>{{ $tx->type }}</td>
                                    <td>{{ $tx->type === 'debit' ? '-' : '' }} Rp {{ number_format($tx->amount, 2) }}</td>
                                    <td>{{ $tx->description }}</td>
                                    <td>{{ $tx->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection