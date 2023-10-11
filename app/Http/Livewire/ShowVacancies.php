<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class ShowVacancies extends Component
{

    //Mandando a llamar desde componente con LiveWire

    protected $listeners = ['deleteVacant'];

    // public function test($vacant_id)
    // {
    //     dd($vacant_id);
    // }

    public function deleteVacant(Vacant $vacant)
    {
        $vacant->delete();
    }

    public function render()
    {
        
        $vacancies = Vacant::where('user_id', auth()->user()->id)->paginate(10);    

        return view('livewire.show-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
