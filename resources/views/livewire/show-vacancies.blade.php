<div>
    <div class="max-w-7xl sm:px-6 lg:px-8">
        
        @forelse ($vacancies as $vacant )
            
        <div class="p-4 bg-white dark:bg-ray-800 overflow-hidden shadow-sm sm:rounded-lg border-b md:flex md:justify-between md:items-center">
            <div class="text-gray-900 dark:text-black space-y-4">
                <a href="{{ route('vacant.show', $vacant->id) }}" class="text-xl font-bold">
                    {{$vacant->tittle}}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{$vacant->company}}
                </p>
                <p class="text-sm text-gray-500 font-bold">{{$vacant->last_day->format('d/m/y')}}
                </p>
            </div>
            
            <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                <a href="{{route('candidate.index', $vacant->id)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Candidates</a>
                
                <a href="{{route('vacant.edit', $vacant->id)}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Edit</a>
                
                <button wire:click="$emit('showAlert', {{$vacant->id}})" class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Delete</button>
            </div>
        </div>
        @empty
        <div class="bg-white rounded p-4">
            <p class="uppercase text-gray-600 text-center font-bold text-sm">
                You don't have any vacancies
            </p>
        </div>
    </div>
    @endforelse
    
    <div>
        {{$vacancies->links()}}
    </div>
</div>

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    </script>

    <script>
        Livewire.on('showAlert', vacantId => {
            Swal.fire({
                title: 'Do you want delete a vacant?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                
                    // Eliminar la vacant desde el servidor

                    Livewire.emit('deleteVacant', vacantId)
                
                    Swal.fire(
                        'Deleted!',
                        'Your vacant has been deleted.',
                        'success'
                    )
            }
            })
        })
    </script>
@endpush
