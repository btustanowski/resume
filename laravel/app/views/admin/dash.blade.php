@extends('admin.meta')

@section('mastercontent')
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">Resume - admin</a>
        <ul class="nav navbar-nav">
            <li><a href="#/education">Education</a></li>
            <li><a href="#/experience">Experience</a></li>
            <li><a href="#/personal">Personal Info</a></li>
            <li><a href="#/interests">Interests</a></li>
            <li><a href="#/testimonials">Testimonials</a></li>
            <li><a href="#/skills">Skills</a></li>
            <li><a href="#/samples">Samples</a></li>
            <li><a href="#/config">Config</a></li>
            <li><a href="#/users">Users</a></li>
        </ul>
        <a href="admin/logout" class="navbar-right btn btn-default navbar-btn"><i class="fa fa-power-off"></i> Log out</a>
    </div>
</nav>
<div id="main" class="container" ng-view></div>
@stop