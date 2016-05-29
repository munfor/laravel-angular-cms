
<!-- flash message -->
<flash-message></flash-message>

<!-- main header -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Users</h3>
        <page-loading ng-show="!vm.ready"></page-loading>
    </div>
</div>

<div class="row" ng-show="vm.ready">
    <div class="col-lg-12">

        <div class="panel panel-default">
            
            @{{ vm.permiso }}

            <!-- heading -->
            <div class="panel-heading panel-heading-admin">
                <span ng-bind="vm.user.name"></span>
            </div>
                       
            <div class="panel-body">

                <!-- name -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" placeholder="Name" class="form-control" ng-model="vm.permiso.idProg"/>
                    </div>
                </div>

                <!-- email -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" placeholder="Email" class="form-control" ng-model="vm.permiso.idOper"/>
                    </div>
                </div>

                <!-- Old password -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" placeholder="Password" class="form-control" ng-model="vm.permiso.idEmpresa"/>
                    </div>
                </div>
                
                <!-- Empresa -->
                <div class="filter pull-left">
                    <span>Empresa:</span>
                    <select ng-model="vm.permiso.idEmpresa" 
                            ng-options="e.id as e.id + ' ' + e.text for e in vm.selectEmpresas" 
                            ng-change="vm.selectCentros = vm.getCentros( vm.permiso.idEmpresa )">
                            <option></option>
                    </select>
                </div>                               
                
                <!-- Centro -->                                
                <div class="filter pull-left">
                    <span>Centro:</span>
                    <select                            
                            ng-model="vm.permiso.idCentro" 
                            ng-options="e.id as e.id + ' ' + e.text for e in vm.selectCentros" >
                            <option></option>
                    </select>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" placeholder="New password" class="form-control" ng-model="vm.permiso.idCentro"/>
                    </div>
                </div>

                <!-- Repeat password -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" placeholder="Repeat new password" class="form-control" ng-model="vm.permiso.idSecu"/>
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
                
                <!-- image -->
                <div class="form-group" ng-show="!vm.user.image">
                    <div class="input-group">
                        <div class="uploader">
                            <button onclick="document.getElementById('single-uploader').click()" class="btn btn-upload">
                                Upload Image
                                <i class="material-icons upload-icon">cloud_upload</i>
                            </button>
                            <input type="file" fileread="vm.user.file" id="single-uploader">
                        </div>
                    </div>
                </div>

                <!-- image preview -->
                <div class="image-container" ng-show="vm.user.file">
                    <div class="img-btn-container animated bounceInDown">
                        <div class="a-image">
                            <img ng-src="@{{ vm.user.file.isImage && vm.user.file.url || null }}" ng-show="vm.user.file.isImage">
                            <div class="not-image" ng-show="!vm.user.file.isImage">
                                <p><i class="material-icons">warning</i></p>
                                <p>File is not an Image</p>
                            </div>
                        </div>
                        <button class="btn btn-dlt-img" ng-click="vm.hideImage()">Delete</button>
                    </div>
                </div>

                <!-- uploaded image -->
                <div class="image-container" ng-show="vm.user.image">
                    <div class="img-btn-container">
                        <div class="a-image">
                            <img ng-src="@{{ vm.user.image && 'admin/images/users/' + vm.user.image || null }}">
                        </div>
                        <button class="btn btn-dlt-img" ng-click="vm.deleteImage(vm.user.id)">Delete</button>
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
                    <button ng-show="!vm.loading"  ng-click="vm.update()" class="btn btn-submit">Update</button>
                </div>

            </div> <!-- / panel body -->

        </div>
    </div>
</div>
