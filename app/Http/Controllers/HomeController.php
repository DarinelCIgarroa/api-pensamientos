<?php

namespace App\Http\Controllers;

use App\Models\Pensamiento;
use Illuminate\Http\Request;
use App\Http\Resources\PensamientoResource;

class HomeController extends Controller
{
    public function index ()
    {
        return (PensamientoResource::collection(Pensamiento::all()))
            ->additional([
                'msg' => 'Lista de pensamientos extraida exitosamente'
            ]);
        
    }
}
