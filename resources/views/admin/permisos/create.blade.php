<!-- flash message -->
<flash-message></flash-message>

<!-- main header -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Permisos</h3>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">

            <!-- heading -->
            <div class="panel-heading">
                Nuevo permiso
            </div>

            <div class="panel-body">

                <!-- name 
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" placeholder="Name" class="form-control" ng-model="vm.user.name"/>
                    </div>
                </div>
                -->

                <!-- email 
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" placeholder="Email" class="form-control" ng-model="vm.user.email"/>
                    </div>
                </div>
                -->

                <!-- Password 
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" placeholder="password" class="form-control" ng-model="vm.user.password"/>
                    </div>
                </div>
                -->

                <!-- Repeat password 
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" placeholder="Repeat password" class="form-control" ng-model="vm.user.repassword"/>
                    </div>
                </div>
                -->

                <!-- Roles -->
                <div class="form-group user-roles">
                    <div class="input-group">
                        <select ng-model="vm.user.user_roles.role" ng-init="vm.user.user_roles.role = 'Role'">
                            <option>Role</option>
                            <option value="0">Not Auth</option>
                            <option value="1">Auth</option>
                            <option value="2" ng-if="vm.authUser.user_roles.role > 2">Admin</option>
                            <option value="3" ng-if="vm.authUser.user_roles.role > 3">Super Admin</option>
                        </select>
                    </div>
                </div>
                
                <!-- Selección de permisos -->
                <div class="form-group">
                    <div class="checkbox">
                        <label><input ng-model="vm.permiso.Alta" type="checkbox" value="0">Alta</label>
                        <label><input ng-model="vm.permiso.Baja" type="checkbox" value="1">Baja</label>
                        <label><input ng-model="vm.permiso.Modificacion" type="checkbox" value="2">Modificación</label>
                        <label><input ng-model="vm.permiso.Consulta" type="checkbox" value="3">Consulta</label>
                    </div>
                </div>

                <!-- errors -->
                <div class="alert alert-danger" role="alert" ng-if="vm.errors">
                    <ul ng-repeat="error in vm.errors">
                        <li ng-bind="error"></li>
                    </ul>
                </div>

                <!-- Submit -->
                <div class="form_submit">
                    <img ng-show="vm.loading" src='/admin/images/main/preloader.gif' alt='preloader gif'>
                    <button ng-show="!vm.loading"  ng-click="vm.create()" class="btn btn-submit">Guardar</button>
                </div>

            </div> <!-- / panel body -->

        </div>
    </div>
</div>


@include('admin.permisos.index')