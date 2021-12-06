<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contacts') }}
            </h2>
            @can('contacts.create')
                <a href="{{ route('contacts.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if($contacts->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach ($contacts as $contact)
                        <div class="w-full bg-gray-900 rounded-lg shadow-lg p-12 flex flex-col justify-center items-center">
                            <div class="mb-4">
                                <img 
                                    src="{{ $contact-> getUrlPathAttribute() }}"
                                    class="rounded-full h-28 w-28 object-cover"
                                >
                            </div>
                            <div class="text-center">
                                <p class="text-xl text-white font-bold mb-4">
                                    {{ $contact->name }}
                                </p>
                            </div>
                            <div class="text-center">
                                @can('contacts.show')
                                    <a href="{{ route('contacts.show', ['contact' => $contact]) }}" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                                        {{ __('Look Contact') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
