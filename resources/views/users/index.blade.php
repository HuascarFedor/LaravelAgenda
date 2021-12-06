<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @if($users->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3">
                        @foreach ($users as $user)
                        <div class="w-full bg-gray-900 rounded-lg shadow-lg p-6 flex flex-col justify-center items-center">
                            <div class="mb-6 flex w-full justify-end">
                                @foreach ($user->roles as $role)
                                    <span class="bg-yellow-200 text-yellow-800 text-xs font-semibold mr-2 px-2 py-1 rounded">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            </div>
                            <div class="text-center">
                                <p class="text-xl text-white font-bold mb-4">
                                    {{ $user->name }}
                                </p>
                                <p class="text-xl text-white font-bold mb-4">
                                    {{ $user->email }}
                                </p>
                            </div>
                            <div class="text-center">
                                @can('users.edit')
                                    <a href="{{ route('users.edit', ['user' => $user]) }}" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                                        {{ __('Assign Role') }}
                                    </a>
                                @endcan
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>