<?php

/* Para crear un controlador con artisan y con funciones de CRUD es
php artisan make:controller TrainerController --resource  
*/

namespace Laradex\Http\Controllers;
use Laradex\Trainer; //Se incorpora el modelo Trainer, Se manda a llamar el model trainer
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trainers =  Trainer::all();//almacena coleccion(array) de entrenadores utiliza metodo all consulta todos los entradores 
        return view("trainers.index", compact("trainers")); //la vista recibe parametro compact genera un array con la informacion asignada
        //return 'Hola controladortrainer';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se crea la vista para dar de alta entrenador
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return $request->all(); //Regresa la respuesta de form (nombre, token)
        //return $request->input('entrenador');

        if ($request->hasFile("avatar")) {
            $file = $request->file("avatar");
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images', $name);

        }

        $trainer = new Trainer(); //instancia a modelo trainer
        $trainer->name = $request->input('entrenador'); //accedemos ala propiedad nombre
        $trainer->avatar = $name;
        $trainer->slug = $request->input('entrenador');
        $trainer->save(); //metodo save para almacenar

        return "Entrenador Guardado";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id) //Se recibe por id
    public function show(Trainer $trainer) //Implicit Baining
    //public function show($slug) //Recibiendo slug
    {
        //
        //$trainer = Trainer::find($id);
        //$trainer = Trainer::where('slug','=',$slug)->firstOrFail(); //firtsOrFail lanza una excepcion
        
        return view('trainers.show', compact("trainer"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function edit($id) //Busqueda por id
    public function edit(Trainer $trainer)//Implementamos el implicit baining
    {
        //
        return view('trainers.edit', compact('trainer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(Request $request, Trainer $trainer)//implementando el  implicit baining
    {
        //
        //return $request;
        $trainer->fill($request->except('avatar'));//Modificar todo excepto el avatar
        //$trainer->fill($request->all());//se encarga de actualizar los datos recibidos  y todo lo que venga del request
        if ($request->hasFile("avatar")) {
            $file = $request->file("avatar");
            $name = time().$file->getClientOriginalName();
            $trainer->avatar = $name;  //actualizar el path
            $file->move(public_path().'/images', $name);
        }
        $trainer->save(); //para almacenar todos lso cambios

        return "Se actualizo correctamente";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
