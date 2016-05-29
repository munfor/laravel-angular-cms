<!-- flash message -->
<flash-message></flash-message>

<!-- Confirm delete modal -->
<div delete-modal ng-if="vm.deleteModal" cancel="vm.hideDeleteModal()" delete="vm.deleteUser(user)"></div>

<!-- main heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Permisos</h3>
        <page-loading ng-show="!vm.ready"></page-loading>
    </div>
</div>

<div class="row" ng-show="vm.ready">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <!-- panel heading -->
            <div class="panel-heading">
                <a ui-sref="permiso-create">
                    Nuevo permiso
                </a>
                
                <!-- count -->
                <div class="count">
                    <span ng-bind="vm.total"></span> permisos                    
                </div>
            </div>
            
                        
            <div class="panel-body">

                <div class="count-search">					

                    <!-- Lista Empresas -->                    		
                    <div class="filter pull-left">
                        <span>Empresa:</span>
                        <select ng-options="e as e.id + ' ' + e.text for e in vm.selectEmpresas" ng-model="vm.Empresa" ng-change="vm.getCentros()">
                                <option></option>
                        </select>
                    </div>

                    <!-- Lista Centros -->                    		
                    <div class="filter pull-left">
                        <span>Centro:</span>
                        <select ng-options="e as e.id + ' ' + e.text for e in vm.selectCentros" ng-model="vm.Centro">
                                <option></option>
                        </select>
                    </div>

                    <!-- Lista Centros correspondientes a la Empresa seleccionada  -->
                    <div class="filter pull-left">
                        <span>Centro:</span>
                        <select ng-model="vm.roleFilter" ng-change="vm.filterByRole()" ng-init="vm.roleFilter = '4'">
                            <option>Role</option>
                            <option value="0">Not Auth</option>
                            <option value="1">Auth</option>
                            <option value="2">Admin</option>
                            <option value="3">Super Admin</option>
                            <option value="4">Owner</option>
                        </select>
                    </div>


                    <!-- search -->
                    <div id="search">
                        <i class="material-icons i-search">search</i>
                        <input type="text" placeholder="Buscar" ng-model="vm.search" ng-keydown="vm.liveSearch()" />
                    </div>

                </div>
                
                <!-- data table -->
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Centro</th>
                            <th>Secu</th>
                            <th>Alta</th>
                            <th>Baja</th>
                            <th>Modi</th>
                            <th>Cons</th>
                            <th class="table-actions"></th>
                        </tr>

                        </thead>
                        <tbody id="search_result">

                        	<tr class="odd gradeX" ng-repeat="p in vm.permisos.data">
                                <td ng-bind="p.idEmpresa + ' ' + p.empresa.Nombre"></td>
                                <td ng-bind="p.idCentro + ' ' + p.centro.Nombre"></td>
                                <td ng-bind="p.idSecu"></td>
                                <td ng-bind="p.Alta"></td>
                                <td ng-bind="p.Baja"></td>
                                <td ng-bind="p.Modificacion"></td>
                                <td ng-bind="p.Consulta"></td>
                                <td class="table-actions">
                                    <a ui-sref="permiso-edit({idProg: p.idProg, idOper: p.idOper, idEmpresa: p.idEmpresa, idCentro: p.idCentro, idSecu: p.idSecu})">
                                        <div class="action action-edit pull-left">
                                            <i class="material-icons action-icon">create</i>
                                        </div>
                                    </a>
                                    <a ng-click="vm.showDeleteModal(p)" ng-if="vm.authUser.user_roles.role > p.user_roles.role">
                                        <div class="action action-delete pull-left">
                                            <i class="material-icons action-icon">delete</i>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div> <!-- / data table -->

                <!-- load more -->
                <div id="loadmore" ng-if="vm.next != null">
                    <button ng-click="vm.loadMore(vm.next)" class="btn">Load More</button>
                </div>

            </div>
        </div>
    </div>
</div>
