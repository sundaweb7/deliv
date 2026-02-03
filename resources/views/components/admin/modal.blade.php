<div x-data="{open:@entangle($attributes->wire('model'))||false}" x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
  <div class="bg-white rounded shadow-lg w-full max-w-2xl p-4">
    <div class="flex justify-between items-center mb-3">
      <h3 class="font-semibold">{{ $title ?? 'Modal' }}</h3>
      <button @click="open = false" class="text-gray-500">✕</button>
    </div>
    <div>{{ $slot }}</div>
  </div>
</div>