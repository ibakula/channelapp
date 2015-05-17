<!DOCTYPE html>
<meta charset= "UTF-8" />
<title>Ivan Bakula App</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />

<div ng-app="App">
    <div class="container" style="margin-top:30px">
        <div class="row" ng-controller="AddPackageController">
            <div class="col-lg-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".create-package-modal"><span class="glyphicon glyphicon-plus"></span> Create a package</button>
                <div class="modal create-package-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add package</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" class="form-control" id="input-package-name" placeholder="Name">
                                    </div>
                                    <div class="input-group" style="margin-top:15px">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-eur"></span>
                                        </div>
                                        <input type="text" class="form-control" id="input-package-price" placeholder="Price">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="pull-right btn btn-success" ng-click="addPackage()"><span class="glyphicon glyphicon-plus"></span> Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" ng-controller="PackageTableController">
            <div class="col-lg-12">
                <table class="table table-hover text-center">
                    <thead>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Edit</th>
                    </thead>
                    <tbody>
                    <tr ng-repeat="row in rowsPackage">
                        <td>{{row.id}}</td>
                        <td>{{row.name}}</td>
                        <td>{{row.price}}</td>
                        <td>
                            <button type="button" class="btn btn-success" ng-click="editModal($event)" data-id="{{row.id}}"><span class="glyphicon glyphicon-pencil"></span></button>
                            <button type="button" class="btn btn-danger" ng-click="packageDelete($event)" data-id="{{row.id}}"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal edit-package-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit package</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="input-group" style="margin-top: 15px">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </div>
                                    <input type="text" class="form-control" id="input-edit-package-name" value="">
                                </div>
                                <div class="input-group" style="margin-top:15px">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-eur"></span>
                                    </div>
                                    <input type="text" class="form-control" id="input-edit-package-price" value="">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="pull-right btn btn-success" ng-click="editPackage()"><span class="glyphicon glyphicon-plus"></span> Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:30px">
        <div class="row" ng-controller="AddChannelController">
            <div class="col-lg-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".create-channel-modal"><span class="glyphicon glyphicon-plus"></span> Create a channel</button>
                <div class="modal create-channel-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add channel</h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" class="form-control" id="input-channel-name" placeholder="Name">
                                    </div>
                                    <div class="input-group" style="margin-top:15px">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-asterisk"></span>
                                        </div>
                                        <select class="form-control" id="input-channel-packageId" ng-controller="PackageTableController">
                                            <option ng-repeat="row in rowsPackage">{{row.id}}</option>
                                        </select>
                                    </div>
                                    <div class="input-group" style="margin-top:15px">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-link"></span>
                                        </div>
                                        <input type="text" class="form-control" id="input-channel-url" placeholder="URL">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="pull-right btn btn-success" ng-click="addChannel()"><span class="glyphicon glyphicon-plus"></span> Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" ng-controller="ChannelTableController">
            <div class="col-lg-12">
                <table class="table table-hover text-center">
                    <thead>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Package Id</th>
                    <th class="text-center">URL</th>
                    <th class="text-center">Edit</th>
                    </thead>
                    <tbody>
                    <tr ng-repeat="row in rowsChannel">
                        <td>{{row.id}}</td>
                        <td>{{row.name}}</td>
                        <td>{{row.packageId}}</td>
                        <td>{{row.url}}</td>
                        <td>
                            <button type="button" class="btn btn-success" ng-click="editChannelModal($event)" data-id="{{row.id}}"><span class="glyphicon glyphicon-pencil"></span></button>
                            <button type="button" class="btn btn-danger" ng-click="channelDelete($event)" data-id="{{row.id}}"><span class="glyphicon glyphicon-trash"></span></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal edit-channel-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit channel</h4>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </div>
                                    <input type="text" class="form-control" id="input-edit-channel-name" value="">
                                </div>
                                <div class="input-group" style="margin-top:15px">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-asterisk"></span>
                                    </div>
                                    <select class="form-control" id="input-edit-channel-packageId" ng-controller="PackageTableController">
                                        <option ng-repeat="row in rowsPackage">{{row.id}}</option>
                                    </select>
                                </div>
                                <div class="input-group" style="margin-top:15px">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-link"></span>
                                    </div>
                                    <input type="text" class="form-control" id="input-edit-channel-url" value="">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="pull-right btn btn-success" ng-click="editChannel()"><span class="glyphicon glyphicon-plus"></span> Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script src="./js/app.js"></script>
<script src="./js/controllers.js"></script>

