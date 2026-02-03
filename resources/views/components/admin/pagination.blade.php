@if ($paginator->hasPages())
<nav class="mt-4 flex items-center justify-between text-sm">
  <div class="flex-1">
    <span class="text-gray-600">Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</span>
  </div>
  <div class="flex gap-2">
    @if ($paginator->onFirstPage())
        <span class="text-gray-400 px-3 py-1 rounded bg-gray-100">Prev</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded bg-white border">Prev</a>
    @endif

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded bg-emerald-500 text-white">Next</a>
    @else
        <span class="text-gray-400 px-3 py-1 rounded bg-gray-100">Next</span>
    @endif
  </div>
</nav>
@endif
