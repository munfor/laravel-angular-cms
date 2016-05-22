<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TMaeEmpresas extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'TMaeEmpresas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idEmp', 'Nombre'];

    /**
     * One to one relation
     */
    public function TAceConfigProg()
    {        
        return $this->belongsTo('App\TAceConfigProg', 'idEmp', 'idEmpresa');
    }
}
