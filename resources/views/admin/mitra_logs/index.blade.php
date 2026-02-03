@extends('admin.layout')

@section('content')
<x-admin.card title="Mitra Status Logs">
    <h1>Mitra Status Logs</h1>

    <form method="get" class="form-inline mb-3">
        <div class="form-group mr-2">
            <input type="text" name="mitra_id" class="form-control" placeholder="Mitra ID" value="{{ request('mitra_id') }}">
        </div>
        <div class="form-group mr-2">
            <input type="text" name="user_id" class="form-control" placeholder="User ID" value="{{ request('user_id') }}">
        </div>
        <div class="form-group mr-2">
            <select name="new_is_open" class="form-control">
                <option value="">Any</option>
                <option value="1" {{ request('new_is_open') === '1' ? 'selected' : '' }}>Open</option>
                <option value="0" {{ request('new_is_open') === '0' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>
        <div class="form-group mr-2">
            <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
        </div>
        <div class="form-group mr-2">
            <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
        </div>
        <button class="btn btn-primary">Filter</button>
    </form>

  <x-admin.table>
    <x-slot name="thead">
      <tr><th>ID</th><th>Mitra</th><th>User</th><th>Old</th><th>New</th><th>Reason</th><th>At</th></tr>
    </x-slot>
    @forelse($logs as $l)
      <tr>
        <td class="py-2">{{ $l['id'] }}</td>
        <td class="py-2">@if($l['mitra']) ID: {{ $l['mitra']['id'] }} @endif</td>
        <td class="py-2">@if($l['user']) {{ $l['user']['name'] ?? $l['user']['id'] }} @endif</td>
        <td class="py-2">{{ $l['old_is_open'] ? 'Open' : 'Closed' }}</td>
        <td class="py-2">{{ $l['new_is_open'] ? 'Open' : 'Closed' }}</td>
        <td class="py-2">{{ $l['reason'] ?? '' }}</td>
        <td class="py-2">{{ $l['created_at'] }}</td>
      </tr>
    @empty
      <tr><td colspan="7" class="py-2">No logs</td></tr>
    @endforelse
  </x-admin.table>

    @if(isset($meta['last_page']))
        @php
            $current = $meta['current_page'] ?? 1;
            $last = $meta['last_page'] ?? 1;
        @endphp
        <nav>
            <ul class="pagination">
                @for($i=1;$i<=$last;$i++)
                    <li class="page-item {{ $i==$current ? 'active' : '' }}"><a class="page-link" href="?{{ http_build_query(array_merge(request()->all(), ['page'=>$i])) }}">{{ $i }}</a></li>
                @endfor
            </ul>
        </nav>
    @endif

</x-admin.card>
@endsection