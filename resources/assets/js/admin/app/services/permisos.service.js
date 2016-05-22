(function() {

    'use strict';

    angular
        .module("app.services")
        .factory("Permiso", Permiso);

    Permiso.$inject = ['$resource'];
    /* @ngInject */
    function Permiso($resource) {
        return $resource('/admin/api/permisos/:id', {id: '@_id'}, {
            update: {
                method: 'PUT'
            }
        });
    }

}());