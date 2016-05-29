(function() {

    'use strict';

    angular
        .module('app.permisos')
        .controller('permisosController', permisosController);

    permisosController.$inject = ['$http', '$timeout', '$stateParams', 'User', 'Permiso', 'Restangular'];
    
    /* @nginject */
    function permisosController($http, $timeout, $stateParams, User, Permiso, Restangular) {

            var vm = this;
                       
            
    //====================================================================================
	            $http({
                        method: 'GET',
                        url: '/list/empresas',
                        data: { applicationId: 3 }
                        }).success(function (result) {
                            vm.selectEmpresas = result;                                                        
                        }
                    );                                
    //====================================================================================
    
    
            
            
            
    
            // Restangular.all('accounts').getList().$object;
            
//            var permisos = Restangular.all('/admin/api/permisos/');
//        
//            permisos.getList().then(function(accounts) {
//                // $scope.allAccounts = accounts;
//                console.log( accounts );
//            });
                                    

        
    //            vm.user = {};
    //            vm.users = {};
    //            vm.authuser = {};            
                vm.create = create;
                // vm.selectCentros = [{}];
                vm.getCentros = getCentros;
                vm.update = update;
    //            vm.deleteUser = deleteUser;
    //            vm.hideImage = hideImage;
    //            vm.deleteImage = deleteImage;
    //            vm.showDeleteModal = showDeleteModal;
    //            vm.hideDeleteModal = hideDeleteModal;
    //            vm.loadMore = loadMore;
    //            vm.liveSearch = liveSearch;
    //            vm.filterByRole = filterByRole;    
    //            authUser();            
            

                
            if(! $stateParams.idProg) { getPermisos(); }
            
            
            if($stateParams.idProg) { getPermiso();  }
                        
            

    //            /**
    //             * Auth user
    //             */
    //            function authUser() {
    //                AuthUser.get().success(function(res) {
    //                    vm.authUser = res;
    //                    vm.isUploaded = res.image ? true : false;
    //                });
    //            }
    
                
        
    // vm.selectEmpresas = [{id: '23', text:'EMPRE'}];
    // vm.selectCentros = [{id: '23', text:'CENTRO'}];
            
            /**
             * Al seleccionar una Empresa se rellena la lista de Centros 
             */
            function getCentros( idEmpresa ) {    
                
                console.log( idEmpresa );
            	      
                //=====================================================================
                //    $http.post('/list/empresas', { idEmpresa: vm.permiso.idEmpresa })
                //        .success(function (res) {                	
                //            vm.selectCentros = res;
                //    });
                //=====================================================================
                
                //=====================================================================
                // var empresas = Restangular.all('list/empresas');
                // return empresas.getList({ idEmpresa: idEmpresa }).$object;
                //=====================================================================
                
                var empresas = Restangular.all('list/empresas');
                
                return empresas.one('idEmpresa', idEmpresa).getList().$object;

            }
            

            /**
             * Get all
             */
            function getPermisos() {            	
                //    Permiso.get(function (res) {
                //         vm.permisos = res.data;
                //         vm.total = res.total;
                //         vm.next = res.next_page_url;
                //         vm.ready = true;
                //    });
                
                var permisos = Restangular.all('/admin/api/');
                vm.permisos = permisos.customGET('permisos').$object;                
                vm.ready = true;
                
                //--------------------------------------------------------------
                //    var p = permisos.customGET('permisos');
                //    p.then(function(a) {
                //        vm.permisos = p.$object;
                //        vm.ready = true;                    
                //    });
                //--------------------------------------------------------------
            }

    
            /**
             * find by id
             */
            function getPermiso() 
            {                
                var permisos = Restangular.all('/admin/api/permisos')
                
                //                vm.permiso = permisos.one('idProg', $stateParams.idProg)
                //                                    .one('idOper', $stateParams.idOper)
                //                                    .one('idEmpresa', $stateParams.idEmpresa)
                //                                    .one('idCentro', $stateParams.idCentro)
                //                                    .one('idSecu', $stateParams.idSecu)
                //                                    .customGET().then(
                //                                        function(){
                //                                            vm.selectCentros = vm.getCentros( vm.permiso.idEmpresa );
                //                                        }
                //                                    )
                //                                    .$object;
                
                var promise = permisos.one('idProg', $stateParams.idProg)
                                      .one('idOper', $stateParams.idOper)
                                      .one('idEmpresa', $stateParams.idEmpresa)
                                      .one('idCentro', $stateParams.idCentro)
                                      .one('idSecu', $stateParams.idSecu)
                                      .customGET();                                    
                promise.then(
                    function(){
                        vm.permiso = promise.$object;
                        vm.selectCentros = vm.getCentros( promise.$object.idEmpresa );
                        vm.ready = true;
                });
                
                
                // vm.Empresa.id = vm.permiso.idEmpresa;
                
                //    vm.permiso = Permiso.get(
                //                    {
                //                            idProg: $stateParams.idProg, 
                //                            idOper: $stateParams.idOper,
                //                            idEmpresa: $stateParams.idEmpresa, 
                //                            idCentro: $stateParams.idCentro, 
                //                            idSecu: $stateParams.idSecu
                //                            }, 
                //        function() {                	
                //            vm.ready = true;
                //    });
            }
    
            
            
            /**
             * Create
             */
            function create() {
                vm.loading = true;
    
                Permiso.save(vm.permiso, function (res) {
                    _successResponse(res.message);
                    //    vm.user = {
                    //        user_roles: {
                    //            role: 'Role'
                    //        }
                    //    };
                }, function (err) {
                    _errorResponse(err.data, 'No se ha podido crear el permiso');
                });
            }
    
    
            /**
             * update user
             */
            function update() {
                
                alert('update');
                
                vm.loading = true;                                
    
                //    User.update({id: vm.user.id}, vm.user, function (res) {
                //        _successResponse(res.message);
                //    }, function (err) {
                //        _errorResponse(err.data, "User edition failed see errors below");
                //    });
                
                var permisos = Restangular.all('/admin/api/permisos')
                
                var promise = permisos
                        //.one('idProg', vm.permiso.idProg)
                        //.one('idOper', vm.permiso.idOper)
                        //.one('idEmpresa', vm.permiso.idEmpresa)
                        //.one('idCentro', vm.permiso.idCentro)
                        //.one('idSecu', vm.permiso.idSecu)
                        //.customPUT(vm.permiso, "messages", {});
                        .customPUT(vm.permiso);
                
                /***************************************************************
                / Mirar como hace Laravel saber como ejecutar la función Update
                / del controlador.
                /
                ***************************************************************/
            }

        
    //        /**
    //         * Delete
    //         */
    //        function deleteUser() {
    //            User.delete({id: vm.user.id}, function (res) {
    //                vm.users.splice(vm.users.indexOf(vm.user), 1);
    //                vm.total = vm.total - 1;
    //                vm.deleteModal = false;
    //                vm.flash = res.message;
    //                $timeout(function () {
    //                    vm.flash = false;
    //                }, 3000);
    //            });
    //        }
    //
    //        /**
    //         * Show delete modal
    //         */
    //        function showDeleteModal(user) {
    //            vm.user = user;
    //            vm.deleteModal = true;
    //        }
    //
    //        /**
    //         * Hide delete modal
    //         */
    //        function hideDeleteModal() {
    //            vm.deleteModal = false;
    //        }
    //
    //        /**
    //         * load more
    //         */
    //        function loadMore(url) {
    //            $http.get(url).success(function (res) {
    //                vm.next = res.next_page_url;
    //                vm.users = vm.users.concat(res.data);
    //            });
    //        }
    //
    //        /**
    //         * Live search
    //         */
    //        function liveSearch() {
    //            $http.post('/admin/api/users/search', {keyword: vm.search}).success(function (res) {
    //                vm.users = res.data;
    //                vm.total = res.total;
    //                vm.next = res.next_page_url;
    //            });
    //        }
    //
    //        /**
    //         * Filter by role
    //         */
    //        function filterByRole() {
    //            $http.post('/admin/api/users/user-role-filter', {role: vm.roleFilter}).success(function (res) {
    //                vm.users = res.data;
    //                vm.total = res.total;
    //                vm.next = res.next_page_url;
    //            });
    //        }
    //
    //        /**
    //         * Delete image
    //         */
    //        function deleteImage(id) {
    //            $http.post('/admin/api/destroy-user-image', {id: id}).success(function(res) {
    //                document.getElementById('single-uploader').value = null;
    //                vm.user.image = null;
    //            });
    //        }
    //
    //        /**
    //         * Hide image
    //         */
    //        function hideImage() {
    //            document.getElementById('single-uploader').value = null;
    //            vm.user.file = false;
    //        }
    
            /**
             * Success response
             */
            function _successResponse(successMessage) {
                vm.errors = '';
                vm.flash = successMessage;
                vm.loading = false;
                $timeout(function () {
                    vm.flash = false;
                }, 5000);
            }
    
            /**
             * Errors response
             */
            function _errorResponse(errors, flashError) {
                vm.errors = errors;
                vm.loading = false;
                vm.flashError = flashError;
                $timeout(function () {
                    vm.flashError = false;
                }, 5000);
            }

    }

}());