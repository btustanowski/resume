<h3>Użytkownicy</h3><hr>
<div class="row">
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Szukaj" ng-model="srch">
    </div>
    <div class="col-md-6">
        <button type="button" class="btn btn-success col-md-12" ng-click="newUser()"><span class="fa fa-plus"></span> Dodaj</button>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Imię i nazwisko</th>
                <th>Login</th>
                <th>Adres e-mail</th>
                <th>Utworzono</th>
                <th class="col-md-2">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="user in users | filter:srch">
                <td>{{user.id}}</td>
                <td>{{user.name}}</td>
                <td>{{user.username}}</td>
                <td>{{user.email}}</td>
                <td>{{user.created_at}}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="editUser(user)"><span class="fa fa-edit"></span> Edytuj</button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown"><span class="fa fa-trash-o"></span> Usuń</button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a ng-click="destroy(user)">Potwierdź usunięcie</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="usersModalLabel">{{popupTitle}}</h4>
            </div>
            <div class="modal-body">
                <form novalidate class="form-horizontal" role="form" name="userForm">
                    <input type="hidden" ng-model="activeUser.id">
                    <div class="form-group" ng-class="{'has-error': userForm.name.$invalid && userForm.name.$dirty}">
                        <label for="f1" class="col-sm-4 control-label">Imię i nazwisko</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="f1" ng-model="activeUser.name" required name="name" ng-pattern="/^[A-Za-z0-9_\- zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{5,30}$/">
                        </div>
                    </div>
                    <div class="form-group" ng-class="{'has-error': userForm.username.$invalid && userForm.username.$dirty}">
                        <label for="f2" class="col-sm-4 control-label">Login</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="f2" ng-model="activeUser.username" required name="username" ng-pattern="/^[A-Za-z0-9_\- zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{5,30}$/">
                        </div>
                    </div>
                    <div class="form-group" ng-class="{'has-error': userForm.email.$invalid && userForm.username.$dirty}">
                        <label for="f2" class="col-sm-4 control-label">E-mail</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="f2" ng-model="activeUser.email" required name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="f2" class="col-sm-4 control-label">Poziom</label>
                        <div class="col-sm-8">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-primary" ng-class="{'active': activeUser.level == 'admin'}">
                                    <input type="radio" name="level" value="admin" ng-model="activeUser.level" ng-checked="model"> Administrator
                                </label>
                                <label class="btn btn-primary" ng-class="{'active': activeUser.level == 'user'}">
                                    <input type="radio" name="level" value="user" ng-model="activeUser.level" ng-checked="model"> Użytkownik
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" ng-class="{'has-error': userForm.password.$invalid && userForm.password.$dirty}">
                        <label for="f3" class="col-sm-4 control-label">Hasło</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="f3" ng-model="activeUser.password" name="password" ng-pattern="/^[A-Za-z0-9_\- zżźćńółęąśŻŹĆĄŚĘŁÓŃ]{0,30}$/">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                <button ng-show="userForm.$valid" type="button" class="btn btn-primary" ng-click="save()">Zapisz</button>
            </div>
        </div>
    </div>
</div>