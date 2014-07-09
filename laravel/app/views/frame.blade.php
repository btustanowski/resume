@extends('components.meta')

@section('mastercontent')
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">Vocabulary trainer</a>
        <ul class="nav navbar-nav">
            <li><a href="#/practice"><span class="fa fa-pencil"></span> Practice</a></li>
            <li><a href="#/test"><span class="fa fa-question"></span> Test</a></li>
            @if(Auth::user()->isAdmin())
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">Manage <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#/users"><span class="fa fa-users"></span> Users</a></li>
                    <li><a href="#/words"><span class="fa fa-list"></span> Words</a></li>
                </ul>
            </li>
            @endif
        </ul>
        <a href="[[ url('user/logout') ]]" class="navbar-right btn btn-default navbar-btn"><i class="fa fa-power-off"></i> Log out</a>
    </div>
</nav>
<div id="main" class="container" ng-view></div>
@stop