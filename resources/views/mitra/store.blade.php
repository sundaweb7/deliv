@extends('admin.layout')

@section('content')
<div class="container">
    <h1>My Store</h1>
    @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
    <p>Store is currently: <strong id="store-status">{{ $mitra->is_open ? 'Open' : 'Closed' }}</strong></p>
    <div>
        <button id="ajax-toggle" class="btn btn-{{ $mitra->is_open ? 'danger' : 'success' }}">{{ $mitra->is_open ? 'Close Store' : 'Open Store' }}</button>
    </div>

    <form method="post" action="{{ route('mitra.store.toggle') }}" id="fallback-form" style="display:none">
        @csrf
        <input type="hidden" name="is_open" value="{{ $mitra->is_open ? 0 : 1 }}">
        <button class="btn btn-{{ $mitra->is_open ? 'danger' : 'success' }}">{{ $mitra->is_open ? 'Close Store' : 'Open Store' }}</button>
    </form>

    @if(!$mitra->is_open)
        <form method="post" action="{{ route('mitra.store.reopen') }}" style="display:inline">
            @csrf
            <button class="btn btn-primary">Reopen (after topup)</button>
        </form>
    @endif

    <hr>
    <h4>Recent Status Changes</h4>
    <ul id="status-logs">
        <li>Loading...</li>
    </ul>

    <script>
        async function fetchLogs() {
            try {
                const res = await fetch('/api/mitra/store/logs', { headers: { 'Accept': 'application/json' } });
                if (!res.ok) return;
                const json = await res.json();
                const ul = document.getElementById('status-logs');
                ul.innerHTML = '';
                if (json.data && json.data.length) {
                    json.data.forEach(l => {
                        const li = document.createElement('li');
                        const dt = new Date(l.created_at).toLocaleString();
                        li.innerText = dt + ' — ' + (l.old_is_open ? 'Open' : 'Closed') + ' → ' + (l.new_is_open ? 'Open' : 'Closed') + (l.reason ? (' — ' + l.reason) : '');
                        ul.appendChild(li);
                    });
                } else {
                    ul.innerHTML = '<li>No recent changes</li>';
                }
            } catch (e) {
                console.error(e);
            }
        }

        document.getElementById('ajax-toggle').addEventListener('click', async function (e) {
            const btn = e.target;
            btn.disabled = true;
            try {
                const currentOpen = document.getElementById('store-status').innerText === 'Open';
                const newValue = !currentOpen;
                const res = await fetch('/api/mitra/store/open', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ is_open: newValue })
                });
                const json = await res.json();
                if (json.success) {
                    document.getElementById('store-status').innerText = json.data.is_open ? 'Open' : 'Closed';
                    btn.className = 'btn btn-' + (json.data.is_open ? 'danger' : 'success');
                    btn.innerText = json.data.is_open ? 'Close Store' : 'Open Store';
                    await fetchLogs();
                } else {
                    alert('Failed to update');
                }
            } catch (err) {
                console.error(err);
                // fallback: submit hidden form
                document.getElementById('fallback-form').submit();
            } finally {
                btn.disabled = false;
            }
        });

        // initial load
        fetchLogs();
    </script>
</div>
@endsection