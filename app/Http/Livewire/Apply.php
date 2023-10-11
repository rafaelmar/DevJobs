<?php

namespace App\Http\Livewire;

use App\Models\Vacant;
use Livewire\Component;
use App\Models\Candidate;
use Livewire\WithFileUploads;
use App\Notifications\NewCandidate;

class Apply extends Component
{   
    // Es necesario llamar a "WithFileUploads para cargar archivos
    use WithFileUploads;

    public $cv;
    public $vacant;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacant $vacant)
    {
        $this->vacant = $vacant;
    }

    public function apply()
    {
        $data = $this->validate();
        
        if ($this->vacant->candidate()->where('user_id', auth()->user()->id)->count() > 0) {
            session()->flash('error', 'You already postuled');
            dd('ya te postulastes');
        } else {
        // Save on the disk

        $cv = $this->cv;
        $this->cv->store('public/cv');
        $data['cv'] = str_replace('public/cv/', '', $cv);
        
        //  Create a candidate, en este caso puedo crear registros en la base de datos ayudandome con las realciones entre los modelos
        
        $this->vacant->candidate()->create([
            'user_id' => auth()->user()->id,
            'vacancies_id' => $this->vacant->id,
            'cv' => $data['cv']
        ]); // En este caso toma automaticamente el campo de "vacant_id" gracias a que estamos usando la relacion "hasMany" en el modelo de "vacant"
        
        // Create a notification
        // aqui estamos instanciando el componente creado como "notificacion"
        $this->vacant->recruiter->notify(new NewCandidate($this->vacant->id, $this->vacant->tittle, auth()->user()->id));
        // Show a message to say "everything is ok"

        session()->flash('message', 'Good luck');

        return redirect()->back();

        }
    }

    public function render()
    {
        return view('livewire.apply');
    }
}
