<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center font-bold text-2xl my-4">Apply</h3>

    @if (session()->has('message'))
        <p class="uppercase border border-green-500 bg-green-100 text-green-600 font-bold p-2 my-5 rounded-lg">
            {{session('message')}}
        </p>
    @else
    <div class="mb-4">
        <form wire:submit.prevent='apply' class="w-96 mt-5">
                <x-input-label for="cv" :value="__('Curriculum (PDF)')"/>
                <x-text-input id="cv" type="file" wire:model="cv" class="block mt-1 w-full" accept=".pdf"/>

                <x-input-error :messages="$errors->get('cv')" class="mt-2" />

                <x-primary-button class="w-full justify-center mt-2">
                    Apply
                </x-primary-button>
        </form>
    </div>
    @endif
</div>
