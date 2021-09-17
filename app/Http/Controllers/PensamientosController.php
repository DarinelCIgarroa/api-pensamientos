<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pensamiento;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Resources\PensamientoResource;
use App\Http\Requests\SavePensamientoRequest;


class PensamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_id = auth()->user()->id;
        return (PensamientoResource::collection(Pensamiento::where('user_id', $user_id)->get()))
                ->additional([
                    'mgs' => 'Lista de pensamientos extraida exitosamente'
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePensamientoRequest $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required|max:255',
        //     'description' => 'required|max:100',
        // ]);
      
        // $pensamiento = Pensamiento::create($request->all());
       

        return (new PensamientoResource(Pensamiento::create($request->all())))
                ->additional(['msg' => 'Pensamiento registrado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pensamiento $pensamiento)
    {
        // $pensamiento = Pensamiento::findOrFail($id);

        // return $pensamiento;

        // return new PensamientoResource(Pensamiento::findOrFail($id));
        return new PensamientoResource($pensamiento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:100',
        ]);

        $pensamiento = Pensamiento::findOrfail($id);

        $pensamiento->title = $request->title;
        $pensamiento->description = $request->description;

        $pensamiento->save();

        return (new PensamientoResource($pensamiento))
                ->additional(['msg' => 'Pensamiento actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pensamiento $pensamiento)
    {
        $this->authorize('delete', $pensamiento);
        // $pensamiento = Pensamiento::findOrFail($id);
        $pensamiento->delete();
        
        // return $pensamiento->id;
        return (new PensamientoResource($pensamiento))
                ->additional(['msg' => 'Pensamiento eliminado correctamente']);
    }
}
