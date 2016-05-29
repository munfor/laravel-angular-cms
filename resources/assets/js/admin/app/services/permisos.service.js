(function() {

    'use strict';

    angular
        .module("app.services")
        .factory("Permiso", Permiso);

    Permiso.$inject = ['$resource'];
    /* @ngInject */
    function Permiso($resource) {        
    	// return $resource('/admin/api/permisos/:idOper/:idProg', {idOper: '@_idOper', idProg: '@_idProg'}, {
    	// return $resource('/admin/api/permisos/', {}, {
    	return $resource
    	(
            // '/admin/api/permisos/:idOper/:idProg/:idEmpresa/:idCentro/:idSecu', {},    			
            // '/admin/api/permisos/:idOper/:idProg/:idEmpresa/:idCentro/:idSecu', { idOper: '@_idOper', idProg: '@_idProg', idEmpresa: '@_idEmpresa', idCentro: '@_idCentro', idSecu: '@_idSecu'},
            // '/admin/api/permisos/:idOper', { idOper: '@_idOper', idProg: '@_idProg', idEmpresa: '@_idEmpresa', idCentro: '@_idCentro', idSecu: '@_idSecu'},
            '/admin/api/permisos/', {},
            { 
                    update: { method: 'PUT' }					
            }
        );
    }

}());