<div class="p-10">
    <div class="mb-2">
        <h3 class="font-bold text-3xl text-gray-800 my-1">
            {{$vacant->tittle}}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-200 p-4 my-10p">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Company:
                <span class="normal-case font-normal">
                    {{$vacant->company}}
                </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Last day:
                <span class="normal-case font-normal">
                    {{$vacant->last_day->toFormattedDateString()}}
                </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Category:
                <span class="normal-case font-normal">
                    {{$vacant->category->category}}
                </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salary:
                <span class="normal-case font-normal">
                    {{$vacant->salary->salary}}
                </span>
            </p>
        </div>
    </div>

    <div  class="md:grid md:grid-cols-6 gap-4   ">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacant/' . $vacant->image)}}" alt="{{'Vacant Image' . $vacant->tittle}}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Vacant Description</h2>
            <p>{{$vacant->description}}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <a class="font-bold" href="{{route('register')}}"> Register now</a><p>If you want to candidate</p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacant::class)
        <livewire:apply :vacant="$vacant"/>
    @endcannot
</div>
