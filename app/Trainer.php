<?php

/* Para crear un modelo junto con un archivo migrations (contorl de versiones para la bd)  con laravel 
el comando es php artisan make:model (nombre archivo) -m   */
namespace Laradex;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['name', 'avatar']; // se especifica que se pueden actualizar los campos nombre y atributo

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
