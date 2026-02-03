<div x-data="{open:@entangle($attributes->wire('model'))||false}" x-show="open" class="modal fade show d-block" style="background: rgba(0,0,0,0.4);">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $title ?? 'Modal' }}</h5>
        <button type="button" class="btn-close" @click="open=false" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ $slot }}
      </div>
    </div>
  </div>
</div>