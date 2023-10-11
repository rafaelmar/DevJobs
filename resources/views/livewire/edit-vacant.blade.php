<div class="md:w-1/2">
    <form class=space-y-6" wire:submit.prevent='editVacant'>
        <div>
            <x-input-label for="tittle" :value="__('Vacant Tittle')" />
    
            <x-text-input id="tittle" 
            class="block mt-1 w-full" 
            type="text" wire:model="tittle" 
            :value="old('tittle')"
            placeholder="Tittle" 
            />
            
            <x-input-error :messages="$errors->get('tittle')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="salary" :value="__('Salary')" />
    
            <select 
                wire:model="salary" id="salary" class="border-gray-300 dark:border-gray-700 dark:bg-black dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            >
    
                <option value="">-- Select Salary --</option>
    
                @foreach ($salaries as $salary )
                    <option 
                    value="{{$salary->id}}">{{ $salary->salary }}
                    </option>
                @endforeach
            </select>
            
            <x-input-error :messages="$errors->get('salary')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="category" :value="__('Category')" />
    
            <select 
            wire:model="category" id="category" class="border-gray-300 dark:border-gray-700 dark:bg-black dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full"
            >
            <option value="">-- Select Salary --</option>
    
                @foreach ($categories as $category )
                    <option 
                    value="{{$category->id}}">{{ $category->category }}
                    </option>
                @endforeach
            </select>
            
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="company" :value="__('Company')" />
    
            <x-text-input id="company" 
            class="block mt-1 w-full" 
            type="text" wire:model="company" 
            :value="old('company')"
            placeholder="Compnay: Ex. Netflix, Uber, Spotify" 
            />
            
            <x-input-error :messages="$errors->get('company')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="last_day" :value="__('Last Day')" />
    
            <x-text-input id="last_day" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="last_day" 
            :value="old('last_day')"
            />
            
            <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="description" :value="__('Description')" />
    
            <textarea wire:model="description" 
            placeholder="Experience"
            class="border-gray-300 dark:border-gray-700 dark:bg-black dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-64"
            ></textarea>
            
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="image" :value="__('Vacant image')" />
    
            <x-text-input id="image" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="newImage"
            accept="image/* "
            />
    
            <div class="my-5 w-96">
                <x-input-label for="image" :value="__('Current Image')" />

                <img src="{{asset('/storage/vacant/' . $image)}}" alt="{{'Current Imange ' . $tittle}}">
            </div>

           <div class="my-5 w-96">
                @if ($newImage)
                New Image:
                    <img src="{{$newImage->temporaryUrl()}}">
                @endif
            </div> 
    
            <x-input-error :messages="$errors->get('newImage')" class="mt-2" />
        </div>
    
        <x-primary-button class="w-full justify-center">
            Save Vacant
        </x-primary-button>
    </form>
    </div>
    