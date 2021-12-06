@if ( $message = Session::get('success')) 
    <div class="fixed inset-x-0 bottom-0 flex items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end z-50">
        <div
            x-data="{ show: false }"
            x-init="() => {
                setTimeout(() => show = true, 500);
                setTimeout(() => show = false, 5000);
            }"
            x-show="show"
            @click.away="show = false"
        >
            <div class="rounded-lg bg-green-300 flex flex-col items-start p-4">
                <div class="w-full flex justify-between">
                    <div class="flex-shrink-0 font-bold">
                        {{ __('Attention ') }}
                    </div>
                    <button @click="show = false" class="text-blue-900 font-bold">
                        X
                    </button>
                </div>
                <div class="flex-1 pt-0.5 mt-2">
                    <p class="text-sm leading-5 font-medium text-gray-900">
                        {{ __($message) }}
                    </p>
                </div>
            </div>
        </div>

    </div>
@endif