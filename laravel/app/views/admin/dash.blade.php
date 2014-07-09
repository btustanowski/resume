@extends('admin.meta')

@section('mastercontent')
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">Resume - admin</a>
        <ul class="nav navbar-nav">
            <li><a href="#/users">Users</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">Datastores <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#/config">Config</a></li>
                    <li><a href="#/config/groups">Config groups</a></li>
                    <li class="divider"></li>
                    <li><a href="#/tags">Tags</a></li>
                </ul>
            </li>
        </ul>
        <a href="admin/logout" class="navbar-right btn btn-default navbar-btn"><i class="fa fa-power-off"></i> Log out</a>
    </div>
</nav>
<div id="main" class="container" ng-view></div>
@stop