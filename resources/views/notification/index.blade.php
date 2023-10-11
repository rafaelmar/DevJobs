<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-ray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-black">
                    <h1 class="text-3xl font-bold text-center my-6">My Notifications</h1>
                    
                        @forelse ($notifications as $notification)
                            <div class="p-5 border border-gray-200 md:flex md:justify-between md:items-center">
                                {{-- Justify between en flex lo que hace es ajustar los elementos a los costados e items-center los centra vertical y horizontal --}}
                                <div>
                                    <p>You have a new candidate in:
                                        <span class="font-bold">{{ $notification->data['vacant_tittle'] }}</span>
                                    </p>
                                    <p>
                                        <span class="font-bold">{{ $notification->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="my-5 lg:my-0">
                                    <a href="#" class="bg-indigo-500 p-3 text-sm uppercase font-bold rounded-lg text-white">See Notification</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-400">You dont have new notifications</p>
                        @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>