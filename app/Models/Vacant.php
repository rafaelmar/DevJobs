<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacant extends Model
{
    use HasFactory;

    protected $table = 'vacancies'; // Con esta linea de codigo puedo seleccionar directamente la tabla a donde quiero que se metan los datos


    protected $casts = ['last_day' => 'date'];
    // $casts es la sintaxis de laravel 9 y 10 para convertir un dato consultado a otro tipo de dato

    protected $fillable = [
        'tittle',
        'salary_id',
        'category_id',
        'company',
        'last_day',
        'description',
        'image',
        'user_id'
    ];

    // Creamos relaciones entre las migraciones en el modelo para moder sacar informacion de ellos, en este caso la categoria y el salario con una funcion cada uno


    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function candidate()
    {
        return $this->hasMany(Candidate::class, 'vacancies_id');
    }// Por el problema que tuve con Eloquent por los nombres en la migracion y el modelo, tengo que señalar directamente cual es la llave foranea desde la relacion

    // Al momento de crear la relacion usuario con vacante y mandar a llamar en este caso a la funcion "recruiter" puedo

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
