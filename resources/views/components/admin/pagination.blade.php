@if ($paginator->hasPages())
<nav class="mt-4 d-flex justify-content-between align-items-center">
  <div>
    <small class="text-muted">Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</small>
  </div>
  <ul class="pagination mb-0">
    <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
      <a class="page-link" href="{{ $paginator->previousPageUrl() ?: '#' }}">Prev</a>
    </li>
    <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
      <a class="page-link" href="{{ $paginator->nextPageUrl() ?: '#' }}">Next</a>
    </li>
  </ul>
</nav>
@endif
