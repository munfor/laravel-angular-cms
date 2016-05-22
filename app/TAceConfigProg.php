<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class TAceConfigProg extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * Disable Auto Timestamps
     * 
     * @var boolean 
     */
    public $timestamps = false;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'TAceConfigProg';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idProg', 'Usuario', 'idOper', 'idEmpresa', 'idCentro', 'idSecu', 'Alta', 'Baja', 'Modificacion', 'Consulta'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = ['password', 'remember_token'];

    /**
     * One to one relation
     */
     public function empresa()
     {
         return $this->hasOne('App\TMaeEmpresas', 'idEmp', 'idEmpresa');
     }
     
     /**
     * One to one relation
     */
     public function centro()
     {
         // dd($this);         
         return $this->hasOne('App\TMaeCentrosDestino', 'idEmp', 'idEmpresa');
     }
}
