<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Read Contact') }}
            </h2>
            <a href="{{ route('contacts.index') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                {{ __('Contacts') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="bg-white max-w-md w-full shadow-md rounded-lg overflow-hidden mx-auto">
                        <div class="h-2 w-full bg-gray-800"></div>

                        <div class="flex justify-center">
                            <img 
                                src="{{ $contact-> getUrlPathAttribute() }}"
                                class="rounded-full h-28 w-28 object-cover"
                            >
                        </div>

                        <div class="px-2 text-center border-b border-red-600 mb-2 pb-2">
                            <h1 class="mt-0 text-xl font-bold">
                                {{ $contact->name }}
                            </h1>
                        </div>

                        <div>
                            <table class="w-full border">
                                <thead>
                                    <tr class="border-t-2 font-bold">
                                        <th class="p-2 border-r w-5/12">{{ __('Description') }}</th>
                                        <th class="p-2 border-r w-5/12">{{ __('Phone') }}</th>
                                        <th class="p-2 border-r w-2/12">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact->phones as $phone)
                                        <tr class="border-t text-sm">
                                            <td class="p-1 pl-2 border-r">{{ $phone->description }}</td>
                                            <td class="p-1 pl-2 border-r">{{ $phone->number }}</td>
                                            <td class="p-1 pl-2 border-r">
                                                @can('contacts.destroy')
                                                    <form action="{{ route('phones.destroy', ['phone' => $phone]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="border-t text-sm">
                                        <form action="{{ route('phones.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                            <td class="p-1 pl-2 border-r">
                                                <input 
                                                    type="text" 
                                                    name="description" 
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 transition-colors duration-200 ease-in-out"
                                                >
                                                @error('description')
                                                    <div class="bg-red-100 text-red-700 px-2 py-0 rounded">
                                                        <span class="block sm:inline text-sm">
                                                            {{ $message }}
                                                        </span>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td class="p-1 pl-2 border-r">
                                                <input 
                                                    type="text" 
                                                    name="number" 
                                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 transition-colors duration-200 ease-in-out"
                                                >
                                                @error('number')
                                                    <div class="bg-red-100 text-red-700 px-2 py-0 rounded">
                                                        <span class="block sm:inline text-sm">
                                                            {{ $message }}
                                                        </span>
                                                    </div>
                                                @enderror
                                            </td>
                                            <td class="p-1 pl-2 border-r">
                                                @can('contacts.create')
                                                    <button type="submit" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                    </button>
                                                @endcan
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="py-4">
                            <div class="flex justify-around">
                                @can('contacts.edit')
                                    <a href="{{ route('contacts.edit', ['contact' => $contact]) }}" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                @endcan
                                @can('contacts.destroy')
                                    <form action="{{ route('contacts.destroy', ['contact' =>  $contact]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
