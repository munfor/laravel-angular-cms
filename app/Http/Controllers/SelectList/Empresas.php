<?php

namespace App\Http\Controllers\SelectList;


use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Empresas extends Controller
{
    /**
     * Muestra una lista de todas las Empresas
     *
     * @return Response
     */
    public function index()
    {    	
		return  DB::table('TEmpre')->select('emp as id', 'nombre as text')->orderBy('emp')->get(); //->paginate(3);
    }
    
    
    /**
     * Muestra una lista de Centros a partir de la Empresa seleccionada
     *
     * @return Response
     */
    public function centros(Request $request)
    {
    	// return  DB::table('TMaeCentrosDestino')->select('idCentro as id', 'Nombre as text')->orderBy('idCentro')->get();
    	
    	$idEmpresa = $request->idEmpresa;    	

		// $users = User::whereHas ( 'TMaeCentrosDestino', function ($query) use ($role) {
		//   $query->where ( 'idEmpresa', $idEmpresa );
		// })->with('UserRoles'); // ->paginate(50);

		$centros = DB::table('TMaeCentrosDestino')
					->where ('idEmpresa', $idEmpresa)
					->select('idCentro as id', 'Nombre as text')
					->orderBy('idCentro')
					->get();
    	
    	return $centros;
    }
}
