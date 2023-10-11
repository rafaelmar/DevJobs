<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditVacant extends Component
{
    public $vacant_id;
    public $tittle;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $description;
    public $image;
    public $newImage;

    use WithFileUploads;

    // Debe escribirse "rules" para que funcione
    protected $rules = [
        'tittle' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'newImage' => 'nullable|image|max:1024'
    ];

    public function mount(Vacant $vacant)
    {
        $this->vacant_id = $vacant->id;
        $this->tittle = $vacant->tittle;
        $this->salary = $vacant->salary_id;
        $this->category = $vacant->category_id;
        $this->company = $vacant->company;
        $this->last_day = Carbon::parse($vacant->last_day)->format('Y-m-d');
        $this->description = $vacant->description;
        $this->image = $vacant->image;

    }

    public function editVacant()
    {
        $data = $this->validate();

        // If a new image exist
            if($this->newImage){
                $image = $this->newImage->store('public/vacant');
                $data['image'] = str_replace('public/vacant', '', $image);
            }
        // find the vacancy to edit

            $vacant = Vacant::find($this->vacant_id);

        // assig values
            $vacant->tittle = $data['tittle'];
            $vacant->salary_id = $data['salary'];
            $vacant->category_id = $data['category'];
            $vacant->company = $data['company'];
            $vacant->last_day = $data['last_day'];
            $vacant->image = $data['image'] ?? $vacant->image;
        // save vacant
            $vacant->save();
        // redirect
            session()->flash('message', 'Update Successful');

            return redirect()->route('vacant.index');
    }

    public function render()
    {
        // Consult DB
        $categories = Category::all();
        $salaries = Salary::all();

        return view('livewire.edit-vacant', [
            'categories' => $categories,
            'salaries' => $salaries
        ]);
    }
}
