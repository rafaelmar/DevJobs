<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacant;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVacant extends Component
{
    //Validacion
    use WithFileUploads;

    public $tittle;
    public $salary;
    public $category;
    public $company;
    public $last_day;
    public $image;
    public $description;


    // Debe escribirse "rules" para que funcione
    protected $rules = [
        'tittle' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024'
    ];

    public function createVacant()
    {
        
        $data = $this->validate();
        
        // Save Image
        //this hace referencia a las propiedades y metodos de esta instancia
        $image = $this->image->store('public/vacant');
        $data['image'] = str_replace('public/vacant/', '', $image); //str_replace toma tres argumentos, el primero es el que se va a suplantar, el segundo es el porque se va a suplantar y el tercero es de donde sacara la informacion    
        

        //Create Vacant

            Vacant::create([
                'tittle' => $data['tittle'],
                'salary_id' => $data['salary'],
                'category_id' => $data['category'],
                'company' => $data['company'],
                'last_day' => $data['last_day'],
                'description' => $data['description'],
                'image' => $data['image'],
                'user_id' => auth()->user()->id
                // Siempre que necesite un usuario verificado necesito hacerlo con auth
            ]);

        //Create Message
            
            session()->flash('message', 'Posted successfully');

            
        //Redirect
            return redirect()->route('vacant.index');
            // return redirect()->to('/dashboard'); con "to" usamos la ruta directamente pero es mejor usar el nombre asignado
        
    }

    public function render()
    {
        // Consult DB
        $categories = Category::all();
        $salaries = Salary::all();

        return view('livewire.create-vacant', [
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
