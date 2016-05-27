<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TEmpre extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'TEmpre';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	// protected $fillable = ['idEmp', 'Nombre'];
	
	/**
	 * One to one relation
	 */
	public function TAceConfigProg() {
		return $this->belongsTo ( 'App\TAceConfigProg', 'emp', 'idEmpresa' );		
	}
}
