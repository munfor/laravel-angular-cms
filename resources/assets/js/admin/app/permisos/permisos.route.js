(function() {

    'use strict';

    angular
        .module('app.permisos')
        .run(appRun);

    appRun.$inject = ['routerHelper'];
    /* @ngInject */
    function appRun(routerHelper) {
        routerHelper.configureStates(getStates());
    }

    function getStates() {
        return [
            {
                state: 'permisos',
                config: {
                    url: '/admin/permisos',
                    templateUrl: '/admin/views/admin.permisos.index',
                    controller: 'permisosController',
                    controllerAs: 'vm',
                    title: 'permisos'
                }
            },
            {
                state: 'permiso-create',
                config: {
                    url: '/admin/permisos/create',
                    templateUrl: '/admin/views/admin.permisos.create',
                    controller: 'permisosController',
                    controllerAs: 'vm',
                    title: 'Create permiso'
                }
            },
            {
                state: 'permiso-edit',
                config: {
                    url: '/admin/permisos/:idProg/:idOper/:idEmpresa/:idCentro/:idSecu/edit',
                    templateUrl: '/admin/views/admin.permisos.edit',
                    controller: 'permisosController',
                    controllerAs: 'vm',
                    title: 'Edit permiso'
                }
            }
        ];
    }
})();