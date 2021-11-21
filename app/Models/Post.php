<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getGetTitleAttribute()
    {
        //Para este metodo en necesariuo cque el nombre de la funcion este entre get**Atribute
        return strtoupper($this->title);
    }
    //Set hace la funcion para guardar en BBDD
    public function setTitleAttribute($value)
    {
        //Para este metodo en necesariuo cque el nombre de la funcion este entre set**Atribute
        $this->attributes['title'] = strtolower($value);  //Guardamos en BBDD el $valor (posts->title) en minuscula
    }
}
