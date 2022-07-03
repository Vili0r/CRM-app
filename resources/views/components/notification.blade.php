<div 
    x-data="{ body: '' }"
    x-on:success.window="body = $event.detail.body; setTimeout(() => body = '', $event.detail.timeout || 2000)"
    x-show="body.length"
    x-cloak
    x-init="
            @if(session()->has('success'))
                window.onload = () => {
                    window.dispatchEvent(new CustomEvent('success', {
                        detail: {
                            body: '{{ session('success') }}',
                            timeout: 3000
                        }
                    }))
                }
            @endif
        " 
    class="fixed inset-0 flex px-4 py-6 items-start pointer-events-none">
    <div class="w-full flex flex-col items-center space-y-4">
        <div class="max-w-sm w-full text-white bg-green-600 rounded-lg pointer-events-auto">
            <div class="p-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 pt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="ml-2 w-0 flex-1 text-white" x-text="body"></div>
                <button class="inline-flex text-gray-400" x-on:click="body = '' ">
                    {{-- <span class="sr-only">Close</span> --}}
                    <span class="text-2xl">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div 
    x-data="{ body: '' }"
    x-on:error.window="body = $event.detail.body; setTimeout(() => body = '', $event.detail.timeout || 2000)"
    x-show="body.length"
    x-cloak
    x-init="
            @if(session()->has('error'))
                window.onload = () => {
                    window.dispatchEvent(new CustomEvent('error', {
                        detail: {
                            body: '{{ session('error') }}',
                            timeout: 3000
                        }
                    }))
                }
            @endif
        " 
    class="fixed inset-0 flex px-4 py-6 items-start pointer-events-none">
    <div class="w-full flex flex-col items-center space-y-4">
        <div class="max-w-sm w-full text-white bg-red-400 rounded-lg pointer-events-auto">
            <div class="p-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 pt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div class="ml-2 w-0 flex-1 text-white" x-text="body"></div>
                <button class="inline-flex text-gray-400" x-on:click="body = '' ">
                    {{-- <span class="sr-only">Close</span> --}}
                    <span class="text-2xl">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
