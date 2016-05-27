<?php

namespace App\Http\Controllers\SelectList;


use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Programas extends Controller
{
    /**
     * Muestra una lista de todos Usuario
     *
     * @return Response
     */
    public function index()
    {    	
		return  DB::table('TProg')->select('idprog as id', 'nombre as text')->orderBy('idprog')->get(); //->paginate(3);
    }
}
