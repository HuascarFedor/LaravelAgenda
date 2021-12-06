<div class="rounded-lg p-8 flex flex-col shadow-md bg-blue-50">
    <h2 class="text-gray-900 text-lg mb-1 font-medium">
        {{ __($title) }}
    </h2>
    <form action="{{ $route }}" method="post" enctype="multipart/form-data">
        @csrf
        @isset($update)
            @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="image" class="leading-7 text-sm text-gray-600">{{ __('Image') }}</label>
            <div class="flex align-items-center">
                @isset($update)
                    <img 
                        src="{{ $contact-> getUrlPathAttribute() }}"
                        class="rounded-full h-12 w-12 object-cover mr-2"
                    >
                @endisset
                <input 
                    type="file" 
                    name="image" 
                    id="image"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 transition-colors duration-200 ease-in-out"
                >
                @error('image')
                    <div class="bg-red-100 text-red-700 px-2 py-0 rounded">
                        <span class="block sm:inline text-sm">
                            {{ $message }}
                        </span>
                    </div>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="name" class="leading-7 text-sm text-gray-600">{{ __('Name') }}</label>
            <input 
                type="text" 
                name="name" 
                id="name"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 transition-colors duration-200 ease-in-out"
                @isset($update)
                value="{{ old('name') ?? $contact->name }}"
                @endisset
            >
            @error('name')
                <div class="bg-red-100 text-red-700 px-2 py-0 rounded">
                    <span class="block sm:inline text-sm">
                        {{ $message }}
                    </span>
                </div>
            @enderror
        </div>

        <button type="submit" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
        </button>
    </form>
</div>