<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Vacant') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-ray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-black">
                    <h1 class="text-3xl font-bold text-center my-6">Vacant</h1>
                    <div class="md:flex md:justify-center p-5">
                        <livewire:create-vacant />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>