<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-center mt-2 text-white">Vacant: {{ $vacant->tittle }}</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-ray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <livewire:show-vacant
                    :vacant="$vacant"
                />
            </div>
        </div>
    </div>
</x-app-layout>