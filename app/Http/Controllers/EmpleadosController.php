<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class EmpleadosController extends Controller
{
    public function index(){
        return view('empleados');
    }

    public function consulta(){

        $data=Empleados::all();
        echo $data;
    }

    public function alta(Request $request){

        Empleados::create($request->all());
        return 'SUCCESS';
    }
}
