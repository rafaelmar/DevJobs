<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;

class ShowVacant extends Component
{

    public $vacant;

    public function render(Vacant $vacant)
    {
        return view('livewire.show-vacant');
    }
}
