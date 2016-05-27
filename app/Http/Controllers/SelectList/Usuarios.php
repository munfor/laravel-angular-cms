<?php

namespace App\Http\Controllers\SelectList;


use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Usuarios extends Controller
{
    /**
     * Muestra una lista de todos Usuario
     *
     * @return Response
     */
    public function index()
    {    	
		return  DB::table('TOper')->select('oper as id', 'nombre as text')->orderBy('oper')->get(); //->paginate(3);
    }
}
