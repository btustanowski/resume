<h3>Użytkownicy</h3><hr>
<div class="row">
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Search" ng-model="srch">
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-success col-md-12" ng-click="newItem()"><span class="fa fa-plus"></span> Add</button>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>E-mail address</th>
                <th>Created at</th>
                <th class="col-md-2">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="item in itemlist | filter:srch">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.username}}</td>
                <td>{{item.email}}</td>
                <td>{{item.created_at}}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="editItem(item)"><span class="fa fa-edit"></span> Edit</button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown"><span class="fa fa-trash-o"></span> Delete</button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a ng-click="destroyItem(item)">Confirm deletion</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="itemModalLabel">{{popupTitle}}</h4>
            </div>
            <div class="modal-body">
                <form novalidate class="form-horizontal" role="form" name="itemForm">
                    <input type="hidden" ng-model="activeItem.id">
                    <div class="form-group" ng-class="{'has-error': itemForm.name.$invalid && itemForm.name.$dirty}">
                        <label for="f1" class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="f1" ng-model="activeItem.name" required name="name" ng-pattern="/^[A-Za-z0-9_\- zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{5,30}$/">
                        </div>
                    </div>
                    <div class="form-group" ng-class="{'has-error': itemForm.username.$invalid && itemForm.username.$dirty}">
                        <label for="f2" class="col-sm-4 control-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="f2" ng-model="activeItem.username" required name="username" ng-pattern="/^[A-Za-z0-9_\- zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{5,30}$/">
                        </div>
                    </div>
                    <div class="form-group" ng-class="{'has-error': itemForm.email.$invalid && itemForm.email.$dirty}">
                        <label for="f2" class="col-sm-4 control-label">E-mail</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="f2" ng-model="activeItem.email" required name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="f2" class="col-sm-4 control-label">Rights</label>
                        <div class="col-sm-8">
                            <div class="btn-group">
                                <label class="btn btn-primary" ng-model="activeItem.level" btn-radio="'admin'">Administrator</label>
                                <label class="btn btn-primary" ng-model="activeItem.level" btn-radio="'user'">User</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" ng-class="{'has-error': itemForm.password.$invalid && itemForm.password.$dirty}">
                        <label for="f3" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="f3" ng-model="activeItem.password" name="password" ng-pattern="/^[A-Za-z0-9_\- zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{0,30}$/">
                        </div>
                    </div>
                </form>

                {{activeItem}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button ng-show="itemForm.$valid" type="button" class="btn btn-primary" ng-click="save()">Save</button>
            </div>
        </div>
    </div>
</div>