<style>
@keyframes toast-blink {
  0%   { transform: translate(-50%, -60px); opacity: 0; }
  20%  { transform: translate(-50%, 0); opacity: 1; }
  80%  { transform: translate(-50%, 0); opacity: 1; }
  100% { transform: translate(-50%, -60px); opacity: 0; }
}

.toast-animate {
  animation: toast-blink 2s ease-in-out forwards;
}
</style>

@if(session('success'))
<div class="fixed top-3 left-1/2 z-[9999] max-w-xs bg-white border border-gray-200 rounded-xl shadow-xl :bg-neutral-800 :border-neutral-700 toast-animate" role="alert">
    <div class="flex items-center p-3 space-x-3">
        <div class="shrink-0">
            <svg class="w-5 h-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-800 whitespace-nowrap">
                {{ session('success') }}
            </p>
        </div>
    </div>
</div>
@endif


@if(session('error'))
<div class="fixed top-3 left-1/2 z-[9999] max-w-xs bg-white border border-gray-200 rounded-xl shadow-xl :bg-neutral-800 :border-neutral-700 toast-animate" role="alert">
    <div class="flex items-center p-3 space-x-3">
        <div class="shrink-0">
            <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-800 :text-neutral-200 whitespace-nowrap">
                {{ session('error') }}
            </p>
        </div>
    </div>
</div>
@endif

@if($errors->any() && !session('error'))
<div class="fixed top-3 left-1/2 z-[9999] max-w-xs bg-white border border-gray-200 rounded-xl shadow-xl :bg-neutral-800 :border-neutral-700 toast-animate" role="alert">
    <div class="flex items-center p-3 space-x-3">
        <div class="shrink-0">
            <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
            </svg>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-800 :text-neutral-200">
                {{ $errors->first() }}
            </p>
        </div>
    </div>
</div>
@endif