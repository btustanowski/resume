<h3>Configuration</h3><hr>
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
                <th>Entry name</th>
                <th>Value</th>
                <th class="col-md-2">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="item in itemlist | filter:srch">
                <td>{{item.id}}</td>
                <td>{{item.entry}}</td>
                <td>{{item.value}}</td>
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
                    <div class="form-group" ng-class="{'has-error': itemForm.entry.$invalid && itemForm.entry.$dirty}">
                        <label for="f1" class="col-sm-4 control-label">Entry</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="f1" ng-model="activeItem.entry" required name="entry">
                        </div>
                    </div>
                    <div class="form-group" ng-class="{'has-error': itemForm.value.$invalid && itemForm.value.$dirty}">
                        <label for="f1" class="col-sm-4 control-label">Value</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="f1" ng-model="activeItem.value" required name="value">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button ng-show="itemForm.$valid" type="button" class="btn btn-primary" ng-click="save()">Save</button>
            </div>
        </div>
    </div>
</div>