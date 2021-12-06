<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Assing Role') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="rounded-lg p-8 flex flex-col shadow-md bg-blue-50">
                        <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="image" class="leading-7 text-sm text-gray-600">{{ __('Name') }}</label>
                                <div class="flex align-items-center">
                                    {{ $user->name }}
                                </div>
                            </div>
                    
                            <div class="mb-4">
                                @foreach ($roles as $role)
                                    @if ($user->hasRole( $role->name ))
                                        <div>
                                            <input checked type="checkbox" name="roles[]" value="{{ $role->id }}" class="mr-2">{{ $role->name }}
                                        </div>
                                    @else
                                        <div>
                                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="mr-2">{{ $role->name }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                    
                            @can('users.edit')
                                <button type="submit" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                                    {{ __('Update') }}
                                </button>
                            @endcan
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>