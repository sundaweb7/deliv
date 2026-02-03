@extends('admin.layout')

@section('page-title','Dashboard')

@section('content')
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-white shadow rounded p-4">
      <div class="text-sm text-gray-500">Users</div>
      <div class="text-2xl font-semibold">{{ \App\Models\User::count() }}</div>
    </div>

    <div class="bg-white shadow rounded p-4">
      <div class="text-sm text-gray-500">Mitras</div>
      <div class="text-2xl font-semibold">{{ \App\Models\Mitra::count() }}</div>
    </div>

    <div class="bg-white shadow rounded p-4">
      <div class="text-sm text-gray-500">Withdrawals Pending</div>
      <div class="text-2xl font-semibold">{{ \App\Models\MitraWithdrawal::where('status','pending')->count() }}</div>
    </div>
  </div>

  <div class="mt-6 bg-white shadow rounded p-4">
    <h3 class="font-semibold mb-2">Recent Withdrawals</h3>
    <table class="w-full text-left">
      <thead class="text-sm text-gray-500">
        <tr><th>ID</th><th>Mitra</th><th>Amount</th><th>Status</th><th>Requested At</th></tr>
      </thead>
      <tbody>
        @foreach(\App\Models\MitraWithdrawal::with('mitra.user')->orderBy('created_at','desc')->limit(5)->get() as $wd)
          <tr class="border-t"><td>{{ $wd->id }}</td><td>{{ $wd->mitra->business_name ?? $wd->mitra->user->name }}</td><td>Rp {{ number_format($wd->amount,0,',','.') }}</td><td>{{ $wd->status }}</td><td>{{ $wd->created_at }}</td></tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection